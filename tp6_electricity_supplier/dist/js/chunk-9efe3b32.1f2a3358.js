(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-9efe3b32"],{1173:function(t,n){t.exports=function(t,n,e,r){if(!(t instanceof n)||void 0!==r&&r in t)throw TypeError(e+": incorrect invocation!");return t}},2463:function(t,n,e){"use strict";e.d(n,"f",(function(){return i})),e.d(n,"d",(function(){return c})),e.d(n,"e",(function(){return a})),e.d(n,"h",(function(){return u})),e.d(n,"g",(function(){return s})),e.d(n,"b",(function(){return f})),e.d(n,"a",(function(){return h})),e.d(n,"c",(function(){return l}));var r=e("1e04"),o="http://testmall.singwa666.com/",i=function(t){return Object(r["b"])(o+"api/smscode",t)},c=function(t){return Object(r["b"])(o+"api/login",t)},a=function(t){return Object(r["a"])(o+"api/logout",t)},u=function(t){return Object(r["a"])(o+"api/user",t)},s=function(t){return Object(r["c"])(o+"api/user/1",t)},f=function(t){return Object(r["a"])(o+"api/category",t)},h=function(t){return Object(r["a"])(o+"api/index/getRotationChart",t)},l=function(t){return Object(r["a"])(o+"api/index/cagegoryGoodsRecommend",t)}},"24c5":function(t,n,e){"use strict";var r,o,i,c,a=e("b8e3"),u=e("e53d"),s=e("d864"),f=e("40c3"),h=e("63b6"),l=e("f772"),v=e("79aa"),p=e("1173"),d=e("a22a"),y=e("f201"),m=e("4178").set,g=e("aba2")(),w=e("656e"),x=e("4439"),_=e("bc13"),b=e("cd78"),j="Promise",E=u.TypeError,L=u.process,O=L&&L.versions,P=O&&O.v8||"",k=u[j],T="process"==f(L),S=function(){},F=o=w.f,N=!!function(){try{var t=k.resolve(1),n=(t.constructor={})[e("5168")("species")]=function(t){t(S,S)};return(T||"function"==typeof PromiseRejectionEvent)&&t.then(S)instanceof n&&0!==P.indexOf("6.6")&&-1===_.indexOf("Chrome/66")}catch(r){}}(),G=function(t){var n;return!(!l(t)||"function"!=typeof(n=t.then))&&n},R=function(t,n){if(!t._n){t._n=!0;var e=t._c;g((function(){var r=t._v,o=1==t._s,i=0,c=function(n){var e,i,c,a=o?n.ok:n.fail,u=n.resolve,s=n.reject,f=n.domain;try{a?(o||(2==t._h&&I(t),t._h=1),!0===a?e=r:(f&&f.enter(),e=a(r),f&&(f.exit(),c=!0)),e===n.promise?s(E("Promise-chain cycle")):(i=G(e))?i.call(e,u,s):u(e)):s(r)}catch(h){f&&!c&&f.exit(),s(h)}};while(e.length>i)c(e[i++]);t._c=[],t._n=!1,n&&!t._h&&A(t)}))}},A=function(t){m.call(u,(function(){var n,e,r,o=t._v,i=M(t);if(i&&(n=x((function(){T?L.emit("unhandledRejection",o,t):(e=u.onunhandledrejection)?e({promise:t,reason:o}):(r=u.console)&&r.error&&r.error("Unhandled promise rejection",o)})),t._h=T||M(t)?2:1),t._a=void 0,i&&n.e)throw n.v}))},M=function(t){return 1!==t._h&&0===(t._a||t._c).length},I=function(t){m.call(u,(function(){var n;T?L.emit("rejectionHandled",t):(n=u.onrejectionhandled)&&n({promise:t,reason:t._v})}))},C=function(t){var n=this;n._d||(n._d=!0,n=n._w||n,n._v=t,n._s=2,n._a||(n._a=n._c.slice()),R(n,!0))},U=function(t){var n,e=this;if(!e._d){e._d=!0,e=e._w||e;try{if(e===t)throw E("Promise can't be resolved itself");(n=G(t))?g((function(){var r={_w:e,_d:!1};try{n.call(t,s(U,r,1),s(C,r,1))}catch(o){C.call(r,o)}})):(e._v=t,e._s=1,R(e,!1))}catch(r){C.call({_w:e,_d:!1},r)}}};N||(k=function(t){p(this,k,j,"_h"),v(t),r.call(this);try{t(s(U,this,1),s(C,this,1))}catch(n){C.call(this,n)}},r=function(t){this._c=[],this._a=void 0,this._s=0,this._d=!1,this._v=void 0,this._h=0,this._n=!1},r.prototype=e("5c95")(k.prototype,{then:function(t,n){var e=F(y(this,k));return e.ok="function"!=typeof t||t,e.fail="function"==typeof n&&n,e.domain=T?L.domain:void 0,this._c.push(e),this._a&&this._a.push(e),this._s&&R(this,!1),e.promise},catch:function(t){return this.then(void 0,t)}}),i=function(){var t=new r;this.promise=t,this.resolve=s(U,t,1),this.reject=s(C,t,1)},w.f=F=function(t){return t===k||t===c?new i(t):o(t)}),h(h.G+h.W+h.F*!N,{Promise:k}),e("45f2")(k,j),e("4c95")(j),c=e("584a")[j],h(h.S+h.F*!N,j,{reject:function(t){var n=F(this),e=n.reject;return e(t),n.promise}}),h(h.S+h.F*(a||!N),j,{resolve:function(t){return b(a&&this===c?k:this,t)}}),h(h.S+h.F*!(N&&e("4ee1")((function(t){k.all(t)["catch"](S)}))),j,{all:function(t){var n=this,e=F(n),r=e.resolve,o=e.reject,i=x((function(){var e=[],i=0,c=1;d(t,!1,(function(t){var a=i++,u=!1;e.push(void 0),c++,n.resolve(t).then((function(t){u||(u=!0,e[a]=t,--c||r(e))}),o)})),--c||r(e)}));return i.e&&o(i.v),e.promise},race:function(t){var n=this,e=F(n),r=e.reject,o=x((function(){d(t,!1,(function(t){n.resolve(t).then(e.resolve,r)}))}));return o.e&&r(o.v),e.promise}})},3024:function(t,n){t.exports=function(t,n,e){var r=void 0===e;switch(n.length){case 0:return r?t():t.call(e);case 1:return r?t(n[0]):t.call(e,n[0]);case 2:return r?t(n[0],n[1]):t.call(e,n[0],n[1]);case 3:return r?t(n[0],n[1],n[2]):t.call(e,n[0],n[1],n[2]);case 4:return r?t(n[0],n[1],n[2],n[3]):t.call(e,n[0],n[1],n[2],n[3])}return t.apply(e,n)}},3702:function(t,n,e){var r=e("481b"),o=e("5168")("iterator"),i=Array.prototype;t.exports=function(t){return void 0!==t&&(r.Array===t||i[o]===t)}},"3b8d":function(t,n,e){"use strict";e.d(n,"a",(function(){return c}));var r=e("795b"),o=e.n(r);function i(t,n,e,r,i,c,a){try{var u=t[c](a),s=u.value}catch(f){return void e(f)}u.done?n(s):o.a.resolve(s).then(r,i)}function c(t){return function(){var n=this,e=arguments;return new o.a((function(r,o){var c=t.apply(n,e);function a(t){i(c,r,o,a,u,"next",t)}function u(t){i(c,r,o,a,u,"throw",t)}a(void 0)}))}}},"3c11":function(t,n,e){"use strict";var r=e("63b6"),o=e("584a"),i=e("e53d"),c=e("f201"),a=e("cd78");r(r.P+r.R,"Promise",{finally:function(t){var n=c(this,o.Promise||i.Promise),e="function"==typeof t;return this.then(e?function(e){return a(n,t()).then((function(){return e}))}:t,e?function(e){return a(n,t()).then((function(){throw e}))}:t)}})},"40c3":function(t,n,e){var r=e("6b4c"),o=e("5168")("toStringTag"),i="Arguments"==r(function(){return arguments}()),c=function(t,n){try{return t[n]}catch(e){}};t.exports=function(t){var n,e,a;return void 0===t?"Undefined":null===t?"Null":"string"==typeof(e=c(n=Object(t),o))?e:i?r(n):"Object"==(a=r(n))&&"function"==typeof n.callee?"Arguments":a}},4178:function(t,n,e){var r,o,i,c=e("d864"),a=e("3024"),u=e("32fc"),s=e("1ec9"),f=e("e53d"),h=f.process,l=f.setImmediate,v=f.clearImmediate,p=f.MessageChannel,d=f.Dispatch,y=0,m={},g="onreadystatechange",w=function(){var t=+this;if(m.hasOwnProperty(t)){var n=m[t];delete m[t],n()}},x=function(t){w.call(t.data)};l&&v||(l=function(t){var n=[],e=1;while(arguments.length>e)n.push(arguments[e++]);return m[++y]=function(){a("function"==typeof t?t:Function(t),n)},r(y),y},v=function(t){delete m[t]},"process"==e("6b4c")(h)?r=function(t){h.nextTick(c(w,t,1))}:d&&d.now?r=function(t){d.now(c(w,t,1))}:p?(o=new p,i=o.port2,o.port1.onmessage=x,r=c(i.postMessage,i,1)):f.addEventListener&&"function"==typeof postMessage&&!f.importScripts?(r=function(t){f.postMessage(t+"","*")},f.addEventListener("message",x,!1)):r=g in s("script")?function(t){u.appendChild(s("script"))[g]=function(){u.removeChild(this),w.call(t)}}:function(t){setTimeout(c(w,t,1),0)}),t.exports={set:l,clear:v}},"43fc":function(t,n,e){"use strict";var r=e("63b6"),o=e("656e"),i=e("4439");r(r.S,"Promise",{try:function(t){var n=o.f(this),e=i(t);return(e.e?n.reject:n.resolve)(e.v),n.promise}})},4439:function(t,n){t.exports=function(t){try{return{e:!1,v:t()}}catch(n){return{e:!0,v:n}}}},"4c95":function(t,n,e){"use strict";var r=e("e53d"),o=e("584a"),i=e("d9f6"),c=e("8e60"),a=e("5168")("species");t.exports=function(t){var n="function"==typeof o[t]?o[t]:r[t];c&&n&&!n[a]&&i.f(n,a,{configurable:!0,get:function(){return this}})}},"4ee1":function(t,n,e){var r=e("5168")("iterator"),o=!1;try{var i=[7][r]();i["return"]=function(){o=!0},Array.from(i,(function(){throw 2}))}catch(c){}t.exports=function(t,n){if(!n&&!o)return!1;var e=!1;try{var i=[7],a=i[r]();a.next=function(){return{done:e=!0}},i[r]=function(){return a},t(i)}catch(c){}return e}},"5c95":function(t,n,e){var r=e("35e8");t.exports=function(t,n,e){for(var o in n)e&&t[o]?t[o]=n[o]:r(t,o,n[o]);return t}},"656e":function(t,n,e){"use strict";var r=e("79aa");function o(t){var n,e;this.promise=new t((function(t,r){if(void 0!==n||void 0!==e)throw TypeError("Bad Promise constructor");n=t,e=r})),this.resolve=r(n),this.reject=r(e)}t.exports.f=function(t){return new o(t)}},"696e":function(t,n,e){e("c207"),e("1654"),e("6c1c"),e("24c5"),e("3c11"),e("43fc"),t.exports=e("584a").Promise},"795b":function(t,n,e){t.exports=e("696e")},"7cd6":function(t,n,e){var r=e("40c3"),o=e("5168")("iterator"),i=e("481b");t.exports=e("584a").getIteratorMethod=function(t){if(void 0!=t)return t[o]||t["@@iterator"]||i[r(t)]}},"96cf":function(t,n,e){var r=function(t){"use strict";var n,e=Object.prototype,r=e.hasOwnProperty,o="function"===typeof Symbol?Symbol:{},i=o.iterator||"@@iterator",c=o.asyncIterator||"@@asyncIterator",a=o.toStringTag||"@@toStringTag";function u(t,n,e,r){var o=n&&n.prototype instanceof d?n:d,i=Object.create(o.prototype),c=new k(r||[]);return i._invoke=E(t,e,c),i}function s(t,n,e){try{return{type:"normal",arg:t.call(n,e)}}catch(r){return{type:"throw",arg:r}}}t.wrap=u;var f="suspendedStart",h="suspendedYield",l="executing",v="completed",p={};function d(){}function y(){}function m(){}var g={};g[i]=function(){return this};var w=Object.getPrototypeOf,x=w&&w(w(T([])));x&&x!==e&&r.call(x,i)&&(g=x);var _=m.prototype=d.prototype=Object.create(g);function b(t){["next","throw","return"].forEach((function(n){t[n]=function(t){return this._invoke(n,t)}}))}function j(t){function n(e,o,i,c){var a=s(t[e],t,o);if("throw"!==a.type){var u=a.arg,f=u.value;return f&&"object"===typeof f&&r.call(f,"__await")?Promise.resolve(f.__await).then((function(t){n("next",t,i,c)}),(function(t){n("throw",t,i,c)})):Promise.resolve(f).then((function(t){u.value=t,i(u)}),(function(t){return n("throw",t,i,c)}))}c(a.arg)}var e;function o(t,r){function o(){return new Promise((function(e,o){n(t,r,e,o)}))}return e=e?e.then(o,o):o()}this._invoke=o}function E(t,n,e){var r=f;return function(o,i){if(r===l)throw new Error("Generator is already running");if(r===v){if("throw"===o)throw i;return S()}e.method=o,e.arg=i;while(1){var c=e.delegate;if(c){var a=L(c,e);if(a){if(a===p)continue;return a}}if("next"===e.method)e.sent=e._sent=e.arg;else if("throw"===e.method){if(r===f)throw r=v,e.arg;e.dispatchException(e.arg)}else"return"===e.method&&e.abrupt("return",e.arg);r=l;var u=s(t,n,e);if("normal"===u.type){if(r=e.done?v:h,u.arg===p)continue;return{value:u.arg,done:e.done}}"throw"===u.type&&(r=v,e.method="throw",e.arg=u.arg)}}}function L(t,e){var r=t.iterator[e.method];if(r===n){if(e.delegate=null,"throw"===e.method){if(t.iterator["return"]&&(e.method="return",e.arg=n,L(t,e),"throw"===e.method))return p;e.method="throw",e.arg=new TypeError("The iterator does not provide a 'throw' method")}return p}var o=s(r,t.iterator,e.arg);if("throw"===o.type)return e.method="throw",e.arg=o.arg,e.delegate=null,p;var i=o.arg;return i?i.done?(e[t.resultName]=i.value,e.next=t.nextLoc,"return"!==e.method&&(e.method="next",e.arg=n),e.delegate=null,p):i:(e.method="throw",e.arg=new TypeError("iterator result is not an object"),e.delegate=null,p)}function O(t){var n={tryLoc:t[0]};1 in t&&(n.catchLoc=t[1]),2 in t&&(n.finallyLoc=t[2],n.afterLoc=t[3]),this.tryEntries.push(n)}function P(t){var n=t.completion||{};n.type="normal",delete n.arg,t.completion=n}function k(t){this.tryEntries=[{tryLoc:"root"}],t.forEach(O,this),this.reset(!0)}function T(t){if(t){var e=t[i];if(e)return e.call(t);if("function"===typeof t.next)return t;if(!isNaN(t.length)){var o=-1,c=function e(){while(++o<t.length)if(r.call(t,o))return e.value=t[o],e.done=!1,e;return e.value=n,e.done=!0,e};return c.next=c}}return{next:S}}function S(){return{value:n,done:!0}}return y.prototype=_.constructor=m,m.constructor=y,m[a]=y.displayName="GeneratorFunction",t.isGeneratorFunction=function(t){var n="function"===typeof t&&t.constructor;return!!n&&(n===y||"GeneratorFunction"===(n.displayName||n.name))},t.mark=function(t){return Object.setPrototypeOf?Object.setPrototypeOf(t,m):(t.__proto__=m,a in t||(t[a]="GeneratorFunction")),t.prototype=Object.create(_),t},t.awrap=function(t){return{__await:t}},b(j.prototype),j.prototype[c]=function(){return this},t.AsyncIterator=j,t.async=function(n,e,r,o){var i=new j(u(n,e,r,o));return t.isGeneratorFunction(e)?i:i.next().then((function(t){return t.done?t.value:i.next()}))},b(_),_[a]="Generator",_[i]=function(){return this},_.toString=function(){return"[object Generator]"},t.keys=function(t){var n=[];for(var e in t)n.push(e);return n.reverse(),function e(){while(n.length){var r=n.pop();if(r in t)return e.value=r,e.done=!1,e}return e.done=!0,e}},t.values=T,k.prototype={constructor:k,reset:function(t){if(this.prev=0,this.next=0,this.sent=this._sent=n,this.done=!1,this.delegate=null,this.method="next",this.arg=n,this.tryEntries.forEach(P),!t)for(var e in this)"t"===e.charAt(0)&&r.call(this,e)&&!isNaN(+e.slice(1))&&(this[e]=n)},stop:function(){this.done=!0;var t=this.tryEntries[0],n=t.completion;if("throw"===n.type)throw n.arg;return this.rval},dispatchException:function(t){if(this.done)throw t;var e=this;function o(r,o){return a.type="throw",a.arg=t,e.next=r,o&&(e.method="next",e.arg=n),!!o}for(var i=this.tryEntries.length-1;i>=0;--i){var c=this.tryEntries[i],a=c.completion;if("root"===c.tryLoc)return o("end");if(c.tryLoc<=this.prev){var u=r.call(c,"catchLoc"),s=r.call(c,"finallyLoc");if(u&&s){if(this.prev<c.catchLoc)return o(c.catchLoc,!0);if(this.prev<c.finallyLoc)return o(c.finallyLoc)}else if(u){if(this.prev<c.catchLoc)return o(c.catchLoc,!0)}else{if(!s)throw new Error("try statement without catch or finally");if(this.prev<c.finallyLoc)return o(c.finallyLoc)}}}},abrupt:function(t,n){for(var e=this.tryEntries.length-1;e>=0;--e){var o=this.tryEntries[e];if(o.tryLoc<=this.prev&&r.call(o,"finallyLoc")&&this.prev<o.finallyLoc){var i=o;break}}i&&("break"===t||"continue"===t)&&i.tryLoc<=n&&n<=i.finallyLoc&&(i=null);var c=i?i.completion:{};return c.type=t,c.arg=n,i?(this.method="next",this.next=i.finallyLoc,p):this.complete(c)},complete:function(t,n){if("throw"===t.type)throw t.arg;return"break"===t.type||"continue"===t.type?this.next=t.arg:"return"===t.type?(this.rval=this.arg=t.arg,this.method="return",this.next="end"):"normal"===t.type&&n&&(this.next=n),p},finish:function(t){for(var n=this.tryEntries.length-1;n>=0;--n){var e=this.tryEntries[n];if(e.finallyLoc===t)return this.complete(e.completion,e.afterLoc),P(e),p}},catch:function(t){for(var n=this.tryEntries.length-1;n>=0;--n){var e=this.tryEntries[n];if(e.tryLoc===t){var r=e.completion;if("throw"===r.type){var o=r.arg;P(e)}return o}}throw new Error("illegal catch attempt")},delegateYield:function(t,e,r){return this.delegate={iterator:T(t),resultName:e,nextLoc:r},"next"===this.method&&(this.arg=n),p}},t}(t.exports);try{regeneratorRuntime=r}catch(o){Function("r","regeneratorRuntime = r")(r)}},a22a:function(t,n,e){var r=e("d864"),o=e("b0dc"),i=e("3702"),c=e("e4ae"),a=e("b447"),u=e("7cd6"),s={},f={};n=t.exports=function(t,n,e,h,l){var v,p,d,y,m=l?function(){return t}:u(t),g=r(e,h,n?2:1),w=0;if("function"!=typeof m)throw TypeError(t+" is not iterable!");if(i(m)){for(v=a(t.length);v>w;w++)if(y=n?g(c(p=t[w])[0],p[1]):g(t[w]),y===s||y===f)return y}else for(d=m.call(t);!(p=d.next()).done;)if(y=o(d,g,p.value,n),y===s||y===f)return y};n.BREAK=s,n.RETURN=f},aba2:function(t,n,e){var r=e("e53d"),o=e("4178").set,i=r.MutationObserver||r.WebKitMutationObserver,c=r.process,a=r.Promise,u="process"==e("6b4c")(c);t.exports=function(){var t,n,e,s=function(){var r,o;u&&(r=c.domain)&&r.exit();while(t){o=t.fn,t=t.next;try{o()}catch(i){throw t?e():n=void 0,i}}n=void 0,r&&r.enter()};if(u)e=function(){c.nextTick(s)};else if(!i||r.navigator&&r.navigator.standalone)if(a&&a.resolve){var f=a.resolve(void 0);e=function(){f.then(s)}}else e=function(){o.call(r,s)};else{var h=!0,l=document.createTextNode("");new i(s).observe(l,{characterData:!0}),e=function(){l.data=h=!h}}return function(r){var o={fn:r,next:void 0};n&&(n.next=o),t||(t=o,e()),n=o}}},b0dc:function(t,n,e){var r=e("e4ae");t.exports=function(t,n,e,o){try{return o?n(r(e)[0],e[1]):n(e)}catch(c){var i=t["return"];throw void 0!==i&&r(i.call(t)),c}}},bc13:function(t,n,e){var r=e("e53d"),o=r.navigator;t.exports=o&&o.userAgent||""},cd78:function(t,n,e){var r=e("e4ae"),o=e("f772"),i=e("656e");t.exports=function(t,n){if(r(t),o(n)&&n.constructor===t)return n;var e=i.f(t),c=e.resolve;return c(n),e.promise}},f201:function(t,n,e){var r=e("e4ae"),o=e("79aa"),i=e("5168")("species");t.exports=function(t,n){var e,c=r(t).constructor;return void 0===c||void 0==(e=r(c)[i])?n:o(e)}}}]);