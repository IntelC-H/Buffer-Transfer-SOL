<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buffer in Browser</title>
</head>
<body>
    <button onclick="Solpay()"></button>
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
                    console.error('[ ] Failed to connect to Phantom wallet or send transaction:', err);
                }
            } else {
                console.log('[ ] Phantom wallet is not installed');
            }
        }
    </script>
</body>
</html>
