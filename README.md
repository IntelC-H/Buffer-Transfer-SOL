# Buffer-Transfer-SOL
This is the enabling Buffer in browser and transfering sol using only javascript.

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
