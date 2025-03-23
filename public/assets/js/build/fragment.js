/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@github/include-fragment-element/dist/include-fragment-element-define.js":
/*!***********************************************************************************************!*\
  !*** ./node_modules/@github/include-fragment-element/dist/include-fragment-element-define.js ***!
  \***********************************************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   IncludeFragmentElement: () => (/* reexport safe */ _include_fragment_element_js__WEBPACK_IMPORTED_MODULE_0__.IncludeFragmentElement),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _include_fragment_element_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./include-fragment-element.js */ "./node_modules/@github/include-fragment-element/dist/include-fragment-element.js");

const root = (typeof globalThis !== 'undefined' ? globalThis : window);
try {
    root.IncludeFragmentElement = _include_fragment_element_js__WEBPACK_IMPORTED_MODULE_0__.IncludeFragmentElement.define();
}
catch (e) {
    if (!(root.DOMException && e instanceof DOMException && e.name === 'NotSupportedError') &&
        !(e instanceof ReferenceError)) {
        throw e;
    }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_include_fragment_element_js__WEBPACK_IMPORTED_MODULE_0__.IncludeFragmentElement);



/***/ }),

/***/ "./node_modules/@github/include-fragment-element/dist/include-fragment-element.js":
/*!****************************************************************************************!*\
  !*** ./node_modules/@github/include-fragment-element/dist/include-fragment-element.js ***!
  \****************************************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   IncludeFragmentElement: () => (/* binding */ IncludeFragmentElement)
/* harmony export */ });
var __classPrivateFieldGet = (undefined && undefined.__classPrivateFieldGet) || function (receiver, state, kind, f) {
    if (kind === "a" && !f) throw new TypeError("Private accessor was defined without a getter");
    if (typeof state === "function" ? receiver !== state || !f : !state.has(receiver)) throw new TypeError("Cannot read private member from an object whose class did not declare it");
    return kind === "m" ? f : kind === "a" ? f.call(receiver) : f ? f.value : state.get(receiver);
};
var __classPrivateFieldSet = (undefined && undefined.__classPrivateFieldSet) || function (receiver, state, value, kind, f) {
    if (kind === "m") throw new TypeError("Private method is not writable");
    if (kind === "a" && !f) throw new TypeError("Private accessor was defined without a setter");
    if (typeof state === "function" ? receiver !== state || !f : !state.has(receiver)) throw new TypeError("Cannot write private member to an object whose class did not declare it");
    return (kind === "a" ? f.call(receiver, value) : f ? f.value = value : state.set(receiver, value)), value;
};
var _IncludeFragmentElement_instances, _IncludeFragmentElement_busy, _IncludeFragmentElement_observer, _IncludeFragmentElement_handleData, _IncludeFragmentElement_getData, _IncludeFragmentElement_getStringOrErrorData, _IncludeFragmentElement_task, _IncludeFragmentElement_fetchDataWithEvents;
const privateData = new WeakMap();
function isWildcard(accept) {
    return accept && !!accept.split(',').find(x => x.match(/^\s*\*\/\*/));
}
let cspTrustedTypesPolicyPromise = null;
class IncludeFragmentElement extends HTMLElement {
    constructor() {
        super(...arguments);
        _IncludeFragmentElement_instances.add(this);
        _IncludeFragmentElement_busy.set(this, false);
        _IncludeFragmentElement_observer.set(this, new IntersectionObserver(entries => {
            for (const entry of entries) {
                if (entry.isIntersecting) {
                    const { target } = entry;
                    __classPrivateFieldGet(this, _IncludeFragmentElement_observer, "f").unobserve(target);
                    if (!(target instanceof IncludeFragmentElement))
                        return;
                    if (target.loading === 'lazy') {
                        __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_handleData).call(this);
                    }
                }
            }
        }, {
            rootMargin: '0px 0px 256px 0px',
            threshold: 0.01,
        }));
    }
    static define(tag = 'include-fragment', registry = customElements) {
        registry.define(tag, this);
        return this;
    }
    static setCSPTrustedTypesPolicy(policy) {
        cspTrustedTypesPolicyPromise = policy === null ? policy : Promise.resolve(policy);
    }
    static get observedAttributes() {
        return ['src', 'loading'];
    }
    get src() {
        const src = this.getAttribute('src');
        if (src) {
            const link = this.ownerDocument.createElement('a');
            link.href = src;
            return link.href;
        }
        else {
            return '';
        }
    }
    set src(val) {
        this.setAttribute('src', val);
    }
    get loading() {
        if (this.getAttribute('loading') === 'lazy')
            return 'lazy';
        return 'eager';
    }
    set loading(value) {
        this.setAttribute('loading', value);
    }
    get accept() {
        return this.getAttribute('accept') || '';
    }
    set accept(val) {
        this.setAttribute('accept', val);
    }
    get data() {
        return __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_getStringOrErrorData).call(this);
    }
    attributeChangedCallback(attribute, oldVal) {
        if (attribute === 'src') {
            if (this.isConnected && this.loading === 'eager') {
                __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_handleData).call(this);
            }
        }
        else if (attribute === 'loading') {
            if (this.isConnected && oldVal !== 'eager' && this.loading === 'eager') {
                __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_handleData).call(this);
            }
        }
    }
    connectedCallback() {
        if (!this.shadowRoot) {
            this.attachShadow({ mode: 'open' });
            const style = document.createElement('style');
            style.textContent = `:host {display: block;}`;
            this.shadowRoot.append(style, document.createElement('slot'));
        }
        if (this.src && this.loading === 'eager') {
            __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_handleData).call(this);
        }
        if (this.loading === 'lazy') {
            __classPrivateFieldGet(this, _IncludeFragmentElement_observer, "f").observe(this);
        }
    }
    request() {
        const src = this.src;
        if (!src) {
            throw new Error('missing src');
        }
        return new Request(src, {
            method: 'GET',
            credentials: 'same-origin',
            headers: {
                Accept: this.accept || 'text/html',
            },
        });
    }
    load() {
        return __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_getStringOrErrorData).call(this);
    }
    fetch(request) {
        return fetch(request);
    }
    refetch() {
        privateData.delete(this);
        __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_handleData).call(this);
    }
}
_IncludeFragmentElement_busy = new WeakMap(), _IncludeFragmentElement_observer = new WeakMap(), _IncludeFragmentElement_instances = new WeakSet(), _IncludeFragmentElement_handleData = async function _IncludeFragmentElement_handleData() {
    if (__classPrivateFieldGet(this, _IncludeFragmentElement_busy, "f"))
        return;
    __classPrivateFieldSet(this, _IncludeFragmentElement_busy, true, "f");
    __classPrivateFieldGet(this, _IncludeFragmentElement_observer, "f").unobserve(this);
    try {
        const data = await __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_getData).call(this);
        if (data instanceof Error) {
            throw data;
        }
        const dataTreatedAsString = data;
        const template = document.createElement('template');
        template.innerHTML = dataTreatedAsString;
        const fragment = document.importNode(template.content, true);
        const canceled = !this.dispatchEvent(new CustomEvent('include-fragment-replace', {
            cancelable: true,
            detail: { fragment },
        }));
        if (canceled) {
            __classPrivateFieldSet(this, _IncludeFragmentElement_busy, false, "f");
            return;
        }
        this.replaceWith(fragment);
        this.dispatchEvent(new CustomEvent('include-fragment-replaced'));
    }
    catch (_a) {
        this.classList.add('is-error');
    }
    finally {
        __classPrivateFieldSet(this, _IncludeFragmentElement_busy, false, "f");
    }
}, _IncludeFragmentElement_getData = async function _IncludeFragmentElement_getData() {
    const src = this.src;
    const cachedData = privateData.get(this);
    if (cachedData && cachedData.src === src) {
        return cachedData.data;
    }
    else {
        let data;
        if (src) {
            data = __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_fetchDataWithEvents).call(this);
        }
        else {
            data = Promise.reject(new Error('missing src'));
        }
        privateData.set(this, { src, data });
        return data;
    }
}, _IncludeFragmentElement_getStringOrErrorData = async function _IncludeFragmentElement_getStringOrErrorData() {
    const data = await __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_getData).call(this);
    if (data instanceof Error) {
        throw data;
    }
    return data.toString();
}, _IncludeFragmentElement_task = async function _IncludeFragmentElement_task(eventsToDispatch) {
    await new Promise(resolve => setTimeout(resolve, 0));
    for (const eventType of eventsToDispatch) {
        this.dispatchEvent(new Event(eventType));
    }
}, _IncludeFragmentElement_fetchDataWithEvents = async function _IncludeFragmentElement_fetchDataWithEvents() {
    try {
        await __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_task).call(this, ['loadstart']);
        const response = await this.fetch(this.request());
        if (response.status !== 200) {
            throw new Error(`Failed to load resource: the server responded with a status of ${response.status}`);
        }
        const ct = response.headers.get('Content-Type');
        if (!isWildcard(this.accept) && (!ct || !ct.includes(this.accept ? this.accept : 'text/html'))) {
            throw new Error(`Failed to load resource: expected ${this.accept || 'text/html'} but was ${ct}`);
        }
        const responseText = await response.text();
        let data = responseText;
        if (cspTrustedTypesPolicyPromise) {
            const cspTrustedTypesPolicy = await cspTrustedTypesPolicyPromise;
            data = cspTrustedTypesPolicy.createHTML(responseText, response);
        }
        __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_task).call(this, ['load', 'loadend']);
        return data;
    }
    catch (error) {
        __classPrivateFieldGet(this, _IncludeFragmentElement_instances, "m", _IncludeFragmentElement_task).call(this, ['error', 'loadend']);
        throw error;
    }
};


/***/ }),

/***/ "./node_modules/@github/include-fragment-element/dist/index.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@github/include-fragment-element/dist/index.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   IncludeFragmentElement: () => (/* reexport safe */ _include_fragment_element_js__WEBPACK_IMPORTED_MODULE_0__.IncludeFragmentElement),
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _include_fragment_element_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./include-fragment-element.js */ "./node_modules/@github/include-fragment-element/dist/include-fragment-element.js");
/* harmony import */ var _include_fragment_element_define_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./include-fragment-element-define.js */ "./node_modules/@github/include-fragment-element/dist/include-fragment-element-define.js");


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_include_fragment_element_js__WEBPACK_IMPORTED_MODULE_0__.IncludeFragmentElement);



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
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**************************************!*\
  !*** ./public/assets/js/fragment.js ***!
  \**************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _github_include_fragment_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @github/include-fragment-element */ "./node_modules/@github/include-fragment-element/dist/index.js");

})();

/******/ })()
;
//# sourceMappingURL=fragment.js.map