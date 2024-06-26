# Buffer-Transfer-SOL
This is the enabling Buffer in browser and transfering sol using only javascript.

# This way is to Enable for using Buffer in browser.
        - yarn add browserify buffer
        - Code the main.js
        - npx browserify main.js -o bundle.js
        - Use the bundle.js
            <script src="./bundle.js"></script>
        
# This way is to transfer the sol using only javascript
    Use this:
        <script src="https://cdnjs.cloudflare.com/ajax/libs/buffer/6.0.3/buffer.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@solana/web3.js@latest/lib/index.iife.min.js"></script>

# How to use any module in HTML using only javascript?
1. Initialize your project:

        mkdir umi-project
        cd umi-project
        npm init -y

2. Install dependencies:

        For example, you have to install the module that you wanna use in HTML:
        npm install @metaplex-foundation/umi-bundle-defaults
        And next, you have to install webpack module:
        npm install webpack webpack-cli --save-dev

3. Create index.js:
        
        For example:
        // index.js
        import * as umi from '@metaplex-foundation/umi-bundle-defaults';
        
        // Example usage of umi
        console.log(umi);

4. Create webpack.config.js:

        // webpack.config.js
        const path = require('path');
        
        module.exports = {
          entry: './index.js',
          output: {
            filename: 'bundle.js',
            path: path.resolve(__dirname, 'dist')
          },
          mode: 'development'
        };

6. Bundle your code:

        npx webpack

5. Create index.html:
   
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>UMI Bundle Defaults in Browser</title>
        </head>
        <body>
          <h1>UMI Bundle Defaults in Browser</h1>
          <script src="dist/bundle.js"></script>
        </body>
        </html>
