/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./index.js":
/*!******************!*\
  !*** ./index.js ***!
  \******************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

eval("const ShareioNftIdl = __webpack_require__(/*! ./idl/share_nft.json */ \"./idl/share_nft.json\");\r\nwindow.ShareioNftIdl = ShareioNftIdl;\r\nconsole.log(\"[ ] ShareioNftIdl\", ShareioNftIdl);\n\n//# sourceURL=webpack://mini/./index.js?");

/***/ }),

/***/ "./idl/share_nft.json":
/*!****************************!*\
  !*** ./idl/share_nft.json ***!
  \****************************/
/***/ ((module) => {

"use strict";
eval("module.exports = /*#__PURE__*/JSON.parse('{\"version\":\"0.1.0\",\"name\":\"share_nft\",\"instructions\":[{\"name\":\"mint\",\"accounts\":[{\"name\":\"signer\",\"isMut\":true,\"isSigner\":true},{\"name\":\"seller\",\"isMut\":true,\"isSigner\":false},{\"name\":\"mint\",\"isMut\":true,\"isSigner\":false},{\"name\":\"associatedTokenAccount\",\"isMut\":true,\"isSigner\":false},{\"name\":\"metadataAccount\",\"isMut\":true,\"isSigner\":false},{\"name\":\"masterEditionAccount\",\"isMut\":true,\"isSigner\":false},{\"name\":\"tokenProgram\",\"isMut\":false,\"isSigner\":false},{\"name\":\"associatedTokenProgram\",\"isMut\":false,\"isSigner\":false},{\"name\":\"tokenMetadataProgram\",\"isMut\":false,\"isSigner\":false},{\"name\":\"systemProgram\",\"isMut\":false,\"isSigner\":false},{\"name\":\"rent\",\"isMut\":false,\"isSigner\":false}],\"args\":[{\"name\":\"name\",\"type\":\"string\"},{\"name\":\"symbol\",\"type\":\"string\"},{\"name\":\"uri\",\"type\":\"string\"},{\"name\":\"purchaseLamports\",\"type\":\"u64\"}]},{\"name\":\"purchase\",\"accounts\":[{\"name\":\"mint\",\"isMut\":true,\"isSigner\":false},{\"name\":\"ownerTokenAccount\",\"isMut\":true,\"isSigner\":false},{\"name\":\"ownerAuthority\",\"isMut\":true,\"isSigner\":true},{\"name\":\"buyerTokenAccount\",\"isMut\":true,\"isSigner\":false},{\"name\":\"buyerAuthority\",\"isMut\":true,\"isSigner\":true},{\"name\":\"rent\",\"isMut\":false,\"isSigner\":false},{\"name\":\"systemProgram\",\"isMut\":false,\"isSigner\":false},{\"name\":\"tokenProgram\",\"isMut\":false,\"isSigner\":false},{\"name\":\"associatedTokenProgram\",\"isMut\":false,\"isSigner\":false}],\"args\":[{\"name\":\"purchaseLamports\",\"type\":\"u64\"}]}]}');\n\n//# sourceURL=webpack://mini/./idl/share_nft.json?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./index.js");
/******/ 	
/******/ })()
;