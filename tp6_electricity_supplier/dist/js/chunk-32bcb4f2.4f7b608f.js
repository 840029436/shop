(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-32bcb4f2"],{"454f":function(t,e,n){n("46a7");var r=n("584a").Object;t.exports=function(t,e,n){return r.defineProperty(t,e,n)}},"45b2":function(t,e,n){},"46a7":function(t,e,n){var r=n("63b6");r(r.S+r.F*!n("8e60"),"Object",{defineProperty:n("d9f6").f})},"85f2":function(t,e,n){t.exports=n("454f")},"85fd":function(t,e,n){"use strict";var r=n("45b2"),a=n.n(r);a.a},bfd0:function(t,e,n){t.exports=n.p+"img/logo.c198210a.jpg"},d6f5:function(t,e,n){"use strict";var r=function(){var t=this,e=t.$createElement;t._self._c;return t._m(0)},a=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("div",{staticClass:"footer",staticStyle:{"margin-bottom":"20px"}},[n("div",{staticClass:"copy-box clearfix"},[n("p",{staticClass:"copyright"},[t._v("\n                Copyright © 2019 singwa All Rights Reserved | 鄂ICP备17019114号-2\n            ")])])])])}],s={name:"footer"},i=s,o=n("2877"),u=Object(o["a"])(i,r,a,!1,null,"b5cfe886",null);e["a"]=u.exports},dd7b:function(t,e,n){"use strict";n.r(e);var r=function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("div",{staticClass:"public-head-layout container"},[r("router-link",{staticClass:"logo",attrs:{to:"/"}},[r("img",{staticClass:"cover",attrs:{src:n("bfd0"),alt:"TP6"}})])],1),r("div",{staticClass:"con"},[r("div",{staticClass:"login-layout container"},[r("div",{staticClass:"form-box login"},[t._m(0),r("div",{staticClass:"tabs_container"},[r("form",{staticClass:"tabs_form",attrs:{action:"",method:"post",id:"login_form"}},[r("div",{staticClass:"form-group"},[r("div",{staticClass:"input-group"},[t._m(1),r("input",{directives:[{name:"model",rawName:"v-model",value:t.phone,expression:"phone"}],staticClass:"form-control phone",attrs:{name:"phone",placeholder:"手机号",maxlength:"11",autocomplete:"off",type:"text"},domProps:{value:t.phone},on:{input:function(e){e.target.composing||(t.phone=e.target.value)}}})])]),r("div",{staticClass:"form-group"},[r("div",{staticClass:"input-group"},[t._m(2),r("input",{directives:[{name:"model",rawName:"v-model",value:t.code,expression:"code"}],staticClass:"form-control password",attrs:{name:"password",placeholder:"请输入验证码",autocomplete:"off",type:"text"},domProps:{value:t.code},on:{input:function(e){e.target.composing||(t.code=e.target.value)}}}),t.sendDisabled?t._e():r("div",{staticClass:"input-group-addon pwd-toggle",attrs:{title:"发送验证码"},domProps:{textContent:t._s(t.sendText)},on:{click:t.sendCode}}),t.sendDisabled?r("div",{staticClass:"input-group-addon pwd-toggle",attrs:{title:"发送验证码"},domProps:{textContent:t._s(t.sendText)}}):t._e()])]),t._m(3),t._m(4),r("button",{staticClass:"btn btn-large btn-primary btn-lg btn-block submit",attrs:{id:"login_submit",type:"button"},on:{click:t.login}},[t._v("登录\n                        ")]),r("br")]),t._m(5)])])])]),r("footer_")],1)},a=[function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"tabs-nav"},[n("h2",[t._v("欢迎登录singwa商城")])])},function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"input-group-addon"},[n("span",{staticClass:"glyphicon glyphicon-phone",attrs:{"aria-hidden":"true"}})])},function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"input-group-addon"},[n("span",{staticClass:"glyphicon glyphicon-lock",attrs:{"aria-hidden":"true"}})])},function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"checkbox"},[n("label",[n("input",{attrs:{checked:"",id:"login_checkbox",type:"checkbox"}}),n("i"),t._v(" 30天内免登录\n                            ")])])},function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"form-group"},[n("div",{staticClass:"error_msg",attrs:{id:"login_error"}})])},function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"tabs_div"},[n("div",{staticClass:"success-box"},[n("div",{staticClass:"success-msg"},[n("i",{staticClass:"success-icon"}),n("p",{staticClass:"success-text"},[t._v("登录成功")])])]),n("div",{staticClass:"option-box"},[n("div",{staticClass:"buts-title"},[t._v("\n                                现在您可以\n                            ")]),n("div",{staticClass:"buts-box"},[n("a",{staticClass:"btn btn-block btn-lg btn-default",attrs:{role:"button",href:"index.html"}},[t._v("继续访问商城")]),n("a",{staticClass:"btn btn-block btn-lg btn-info",attrs:{role:"button",href:"udai_welcome.html"}},[t._v("登录会员中心")])])])])}],s=(n("a481"),n("96cf"),n("3b8d"));n("386d"),n("3b2b");function i(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}var o=n("85f2"),u=n.n(o);function l(t,e){for(var n=0;n<e.length;n++){var r=e[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),u()(t,r.key,r)}}function c(t,e,n){return e&&l(t.prototype,e),n&&l(t,n),t}var d=function(){function t(){i(this,t)}return c(t,null,[{key:"valid",value:function(){for(var t=document.getElementsByClassName("lvalid"),e=0;e<t.length;e++){if("required"===t[e].getAttribute("required")&&this.isNull(t[e].value))return t[e].getAttribute("info");if("int"===t[e].getAttribute("valid")&&!this.isInt(t[e].value)&&!isNull(t[e].value))return t[e].getAttribute("validInfo");if("number"===t[e].getAttribute("valid")&&!isNull(t[e].value)&&!this.isNumber(t[e].value))return t[e].getAttribute("validInfo");if("decimal"===t[e].getAttribute("valid")&&!isNull(t[e].value)&&!this.isDecimal(t[e].value))return t[e].getAttribute("validInfo");if("mobile"===t[e].getAttribute("valid")&&!isNull(t[e].value)&&!this.isMobile(t[e].value))return t[e].getAttribute("validInfo");if("phone"===t[e].getAttribute("valid")&&!isNull(t[e].value)&&!this.isPhone(t[e].value))return t[e].getAttribute("validInfo");if("email"===t[e].getAttribute("valid")&&!isNull(t[e].value)&&!this.isEmail(t[e].value))return t[e].getAttribute("validInfo");if("tel"===t[e].getAttribute("valid")&&!isNull(t[e].value)&&!this.isTel(t[e].value))return t[e].getAttribute("validInfo")}return!0}},{key:"getValue",value:function(){var t=this.valid();if(!0===t){for(var e=document.getElementsByClassName("lvalid"),n={},r=0;r<e.length;r++)n[e[r].getAttribute("id")]=e[r].value;return n}return t}},{key:"isNull",value:function(t){if(0===t)return!1;if(""===t||null===t||void 0===t)return!0;var e="^[ ]+$",n=new RegExp(e);return n.test(t)}},{key:"isUsername",value:function(t){var e=t.substring(0,1);if(!(e>="a"&&e<="z"||e>="A"&&e<="Z"))return!1;var n=new RegExp("[a-zA-Z_][a-zA-Z_0-9]{0,}","");return n.test(t)}},{key:"isPassword",value:function(t){var e=/^[0-9A-Za-z_]{6,16}$/;return e.test(t)}},{key:"isRealName",value:function(t){var e="^[a-zA-Z一-龥]+$",n=new RegExp(e);return n.test(t)}},{key:"isEmail",value:function(t){var e=/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;return e.test(t)}},{key:"isNumber",value:function(t){var e=/^[-]{0,1}[0-9]{1,}$/;return e.test(t)}},{key:"isInt",value:function(t){if(null===t||void 0===t)return!1;var e="^[0-9]+$",n=new RegExp(e);return-1!==t.search(n)}},{key:"isDecimal",value:function(t){if(this.isNumber(t))return!0;var e=/^[-]{0,1}(\d+)[\.]+(\d+)$/;return!!e.test(t)&&!(0===RegExp.$1&&0===RegExp.$2)}},{key:"isMobile",value:function(t){var e=t.length;if(11!==e)return!1;var n=t.charAt(0);return 1===n}},{key:"checkMobile",value:function(t){var e=/^[1][3|4|5|8][0-9]{9}$/,n=new RegExp(e);return!!n.test(t)}},{key:"isPhone",value:function(t){var e=/^[0][1-9]{2,3}-[0-9]{5,10}$/,n=/^[1-9]{1}[0-9]{5,8}$/;return t.length>9?e.test(t):n.test(t)}},{key:"isTel",value:function(t){return!!this.isMobile(t)||this.isPhone(t)}},{key:"formatDate",value:function(t){var e=new Date(t),n="-",r=e.getFullYear(),a=e.getMonth()+1,s=e.getDate();a>=1&&a<=9&&(a="0"+a),s>=0&&s<=9&&(s="0"+s);var i=r+n+a+n+s;return i}},{key:"modifyDate",value:function(t){var e=new Date(t),n="-",r=e.getFullYear()+1,a=e.getMonth(),s=e.getDate();a>=1&&a<=9&&(a="0"+a),s>=0&&s<=9&&(s="0"+s);var i=r+n+a+n+s;return i}}]),t}(),v=d,f=n("d6f5"),p=n("2463"),b={name:"login",components:{footer_:f["a"]},data:function(){return{sendDisabled:!1,sendText:"发送验证码",phone:"",code:"",url:""}},mounted:function(){this.url=decodeURIComponent(this.$route.query.redirect)},methods:{sendCode:function(){var t=Object(s["a"])(regeneratorRuntime.mark((function t(){var e,n,r,a;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(e=this,""!=this.phone&&v.checkMobile(this.phone)){t.next=4;break}return this.$Message.error("请输入正确的手机号码！"),t.abrupt("return");case 4:return t.next=6,Object(p["f"])({phone_number:this.phone});case 6:if(n=t.sent,0!=n.status){t.next=12;break}return this.$Message.error(n.message),t.abrupt("return");case 12:this.$Message.success(n.message),r=60,this.sendDisabled=!0,a=setInterval((function(){r<=0?(e.sendText="发送验证码",clearInterval(a),e.sendDisabled=!1):(e.sendText=r+"秒后重新获取",r--)}),1e3);case 16:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}(),login:function(){var t=Object(s["a"])(regeneratorRuntime.mark((function t(){var e;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(""!=this.phone){t.next=3;break}return this.$Message.error("请输入正确的手机号码！"),t.abrupt("return");case 3:if(""!=this.code){t.next=6;break}return this.$Message.error("请输入短信验证码！"),t.abrupt("return");case 6:return t.next=8,Object(p["d"])({phone_number:this.phone,code:this.code,type:2});case 8:if(e=t.sent,1!=e.status){t.next=15;break}localStorage.setItem("token",e.result.token),localStorage.setItem("username",e.result.username),"undefined"==this.url?this.$router.replace("/"):this.$router.replace(this.url),t.next=17;break;case 15:return this.$Message.error(e.message),t.abrupt("return");case 17:console.log(e);case 18:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}()}},h=b,g=(n("85fd"),n("2877")),m=Object(g["a"])(h,r,a,!1,null,"575ec6a3",null);e["default"]=m.exports}}]);