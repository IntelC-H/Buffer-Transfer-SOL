<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buffer in Browser</title>
</head>
<body>
    This is:
    <br>
    1. Test program to transfer sol in Phantom wallet using only javascript.
    <button onclick="Solpay()" style="height: 50px; width: 200px;">Pay using Phantom wallet</button>
    <br><br>
    2. Test program to get the NFT Token address from my Phantom wallet.
    <button onclick="getTokenAddress()" style="height: 50px; width: 200px;">Get token address</button>
    <!-- 
    This way is to Enable for using Buffer in browser.
        1. yarn add browserify buffer
        2. Code the main.js
        3. npx browserify main.js -o bundle.js
        4. Use the bundle.js
            <script src="./bundle.js"></script>
        
    This way is to transfer the sol using only javascript
        Use this:
            <script src="https://cdnjs.cloudflare.com/ajax/libs/buffer/6.0.3/buffer.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@solana/web3.js@latest/lib/index.iife.min.js"></script>
    -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/buffer/6.0.3/buffer.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@solana/web3.js@latest/lib/index.iife.min.js"></script>
    <script src="./bundle.js"></script>
    <script>
        async function Solpay() {
            const { Connection, PublicKey, LAMPORTS_PER_SOL, clusterApiUrl, Keypair, Transaction, SystemProgram } = solanaWeb3;

            const connection = new Connection(clusterApiUrl('devnet'));                                             // Connect to the Solana devnet

            if (window.solana && window.solana.isPhantom) {                                                         // Check if Phantom wallet is installed
                try {
                    const response = await window.solana.connect();                                                 // Connect to the Phantom wallet
                    
                    const publicKey = response.publicKey;                                                           // Get the public key
                    to = new PublicKey("4zLA3rGByXgrZNVug56x558Q7r1Pw8kFFNVsbP2mUzJb");
                    console.log('[ ] Connected to Phantom wallet. Public key:', publicKey.toString());

                    const { blockhash } = await connection.getLatestBlockhash();                                    // Fetch the latest blockhash
                    
                    const transaction = new Transaction({                                                           // Create a transaction
                        feePayer: publicKey,
                        recentBlockhash: blockhash,
                    }).add(
                        SystemProgram.transfer({
                            fromPubkey: publicKey,
                            toPubkey: to,                                                                           // Dummy recipient for example
                            lamports: LAMPORTS_PER_SOL / 10,                                                        // Amount in lamports (1 lamport = 10^-9 SOL)
                        })
                    );

                    const signedTransaction = await window.solana.signTransaction(transaction);                     // Request the Phantom wallet to sign the transaction
                    console.log('[ ] Transaction signed:', signedTransaction);

                    const txid = await connection.sendRawTransaction(signedTransaction.serialize());                // Send the transaction
                    console.log('[ ] Transaction sent with ID:', txid);
                } catch (err) {
                    console.log('[ ] Failed to connect to Phantom wallet or send transaction:', err);
                }
            } else {
                console.log('[ ] Phantom wallet is not installed');
            }
        }

        async function getTokenAddress() {
            const { Connection, PublicKey, LAMPORTS_PER_SOL, clusterApiUrl, Keypair, Transaction, SystemProgram } = solanaWeb3;

            const connection = new Connection(clusterApiUrl('devnet'));                                             // Connect to the Solana devnet

            if (window.solana && window.solana.isPhantom) {
                const res = await window.solana.connect();
                const walletPublicKey = res.publicKey;
                try {
                // Fetch all token accounts of the wallet
                const tokenAccounts = await connection.getParsedTokenAccountsByOwner(walletPublicKey, {
                programId: new solanaWeb3.PublicKey("TokenkegQfeZyiNwAJbNbGKPFXCWuBvf9Ss623VQ5DA")
                });

                // Filter token accounts to find NFTs
                const nftMintAddresses = tokenAccounts.value
                .filter((tokenAccount) => {
                    const accountData = tokenAccount.account.data.parsed.info;
                    return accountData.tokenAmount.amount === "1" && accountData.tokenAmount.decimals === 0;
                })
                .map((tokenAccount) => tokenAccount.account.data.parsed.info.mint);

                console.log('[ ] NFT Mint Addresses:', nftMintAddresses);
            } catch (err) {
                console.log('[ ] Error retrieving NFT mint addresses:', err);
            }
            }
        }
    </script>
</body>
</html>
