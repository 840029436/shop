(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-9d4a8850"],{"067f":function(t,e,a){"use strict";var s=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"top-search"},[s("div",{staticClass:"inner"},[s("router-link",{staticClass:"logo",attrs:{to:"/"}},[s("img",{staticClass:"cover",attrs:{src:a("bfd0"),alt:"TP6"}})]),t._m(0),s("div",{staticClass:"cart-box"},[s("router-link",{staticClass:"cart-but",attrs:{to:"/cart"}},[s("i",{staticClass:"iconfont icon-shopcart cr fz16"}),t._v(" 购物车 0 件\n                ")])],1)],1)])},n=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"search-box"},[a("form",{staticClass:"input-group"},[a("input",{attrs:{placeholder:"Ta们都在搜singwa商城",type:"text"}}),a("span",{staticClass:"input-group-btn"},[a("button",{attrs:{type:"button"}},[a("span",{staticClass:"glyphicon glyphicon-search",attrs:{"aria-hidden":"true"}})])])]),a("p",{staticClass:"help-block text-nowrap"},[a("a",{attrs:{href:""}},[t._v("连衣裙")]),a("a",{staticStyle:{"margin-left":"5px"},attrs:{href:""}},[t._v("裤")]),a("a",{staticStyle:{"margin-left":"5px"},attrs:{href:""}},[t._v("衬衫")]),a("a",{staticStyle:{"margin-left":"5px"},attrs:{href:""}},[t._v("T恤")]),a("a",{staticStyle:{"margin-left":"5px"},attrs:{href:""}},[t._v("女包")]),a("a",{staticStyle:{"margin-left":"5px"},attrs:{href:""}},[t._v("家居服")]),a("a",{staticStyle:{"margin-left":"5px"},attrs:{href:""}},[t._v("2017新款")])])])}],r={name:"search"},i=r,o=a("2877"),c=Object(o["a"])(i,s,n,!1,null,"72bc2eb3",null);e["a"]=c.exports},"1e4b":function(t,e,a){"use strict";a.r(e);var s=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",[a("header_"),a("search"),a("div",{staticClass:"top-nav bg3"},[a("div",{staticClass:"nav-box inner"},[a("div",{staticClass:"all-cat"},[t._m(0),a("div",{staticClass:"cat-list__box"},t._l(t.categoryInfo,(function(e,s){return a("div",{staticClass:"cat-box"},[a("div",{staticClass:"title"},[a("i",{staticClass:"iconfont icon-skirt ce"}),a("span",{domProps:{textContent:t._s(e.name)},on:{click:function(a){return t.category(e.category_id)}}})]),a("ul",{staticClass:"cat-list clearfix"},t._l(e.list,(function(e,s){return a("li",{domProps:{textContent:t._s(e.name)},on:{click:function(a){return t.category(e.category_id)}}})})),0),a("div",{staticClass:"cat-list__deploy"},[a("div",{staticClass:"deploy-box"},t._l(e.list,(function(e,s){return a("div",{staticClass:"genre-box clearfix"},[a("span",{staticClass:"title"},[a("span",{domProps:{textContent:t._s(e.name)}}),t._v("：")]),a("div",{staticClass:"genre-list"},t._l(e.list,(function(e,s){return a("a",{domProps:{textContent:t._s(e.name)},on:{click:function(a){return t.category(e.category_id)}}})})),0)])})),0)])])})),0)]),t._m(1)])]),a("div",{staticClass:"swiper-container banner-box"},[a("div",{staticClass:"swiper-wrapper"},t._l(t.bannerInfo,(function(t,e){return a("div",{staticClass:"swiper-slide"},[a("router-link",{attrs:{to:"/detail"}},[a("img",{staticClass:"cover",attrs:{src:t.image}})])],1)})),0),a("div",{staticClass:"swiper-pagination"})]),a("div",{staticClass:"content inner",staticStyle:{"margin-bottom":"40px"}},t._l(t.goodsInfo,(function(e,s){return a("section",{class:[s%2==0?"floor-2":"floor-3","scroll-floor"]},[a("div",{staticClass:"floor-title"},[a("i",{staticClass:"iconfont icon-skirt fz16"}),a("span",{domProps:{textContent:t._s(e.categorys.name)}}),a("div",{staticClass:"case-list fz0 pull-right"},t._l(e.categorys.list,(function(e,s){return a("a",{domProps:{textContent:t._s(e.name)}})})),0)]),a("div",{staticClass:"con-box"},[a("div",{staticClass:"right-box"},t._l(e.goods,(function(e,s){return a("router-link",{staticClass:"floor-item",attrs:{to:"/detail"}},[a("div",{staticClass:"item-img hot-img"},[a("img",{staticClass:"cover",attrs:{src:e.image}})]),a("div",{staticClass:"price clearfix"},[a("span",{staticClass:"pull-left cr fz16",domProps:{textContent:t._s("￥"+e.price)}}),a("span",{staticClass:"pull-right c6"},[t._v("价格")])]),a("div",{staticClass:"name ep",domProps:{textContent:t._s(e.title)}})])})),1)])])})),0)],1)},n=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"title"},[a("i",{staticClass:"iconfont icon-menu"}),t._v(" 全部分类")])},function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("ul",{staticClass:"nva-list"},[a("a",{attrs:{href:"/"}},[a("li",{staticClass:"active"},[t._v("首页")])])])}],r=(a("96cf"),a("3b8d")),i=(a("a481"),a("5b07")),o=a("067f"),c=a("2463"),l={components:{header_:i["a"],search:o["a"]},name:"index",data:function(){return{categoryInfo:[],bannerInfo:[],isShow:0,goodsInfo:[]}},mounted:function(){this.$nextTick((function(){this.isShow=1,setTimeout((function(){new Swiper(".banner-box",{autoplayDisableOnInteraction:!1,pagination:".banner-box .swiper-pagination",paginationClickable:!0,autoplay:5e3}),new Swiper(".notice-box .swiper-container",{paginationClickable:!0,mousewheelControl:!0,direction:"vertical",slidesPerView:10,autoplay:2e3})}),2e3)})),this.getCategoryInfo(),this.getBannerInfo(),this.getGoodsInfo()},methods:{category:function(t){this.$router.replace("/category?cid="+t)},getCategoryInfo:function(){var t=Object(r["a"])(regeneratorRuntime.mark((function t(){var e;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,Object(c["b"])();case 2:e=t.sent,this.categoryInfo=e.result,console.log(this.categoryInfo);case 5:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}(),getBannerInfo:function(){var t=Object(r["a"])(regeneratorRuntime.mark((function t(){var e;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,Object(c["a"])();case 2:e=t.sent,this.bannerInfo=e.result;case 4:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}(),getGoodsInfo:function(){var t=Object(r["a"])(regeneratorRuntime.mark((function t(){var e;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,Object(c["c"])();case 2:e=t.sent,this.goodsInfo=e.result,console.log(e);case 5:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}()}},u=l,f=a("2877"),p=Object(f["a"])(u,s,n,!1,null,"21f1dd90",null);e["default"]=p.exports},"5b07":function(t,e,a){"use strict";var s=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"tab-header"},[a("div",{staticClass:"inner"},[t._m(0),a("div",{staticClass:"pull-right"},[t.username?t._e():a("router-link",{attrs:{to:"/login"}},[a("span",{staticClass:"cr",domProps:{textContent:t._s("请登录")}})]),t.username?a("router-link",{attrs:{to:"/mine/set"}},[a("span",{staticStyle:{color:"red"},domProps:{textContent:t._s(t.username)}}),t._v(",个人中心\n            ")]):t._e(),t.username?a("span",{on:{click:t.logout}},[t._v("  退出")]):t._e()],1)])])},n=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"pull-left"},[a("div",{staticClass:"pull-left"},[t._v("嗨，欢迎来到"),a("span",{staticClass:"cr",attrs:{onclick:"location.href='/'"}},[t._v("singwa商城")])])])}],r=(a("96cf"),a("3b8d")),i=a("2463"),o={name:"header_",data:function(){return{username:""}},mounted:function(){this.username=localStorage.getItem("username"),console.log(this.username)},methods:{logout:function(){var t=Object(r["a"])(regeneratorRuntime.mark((function t(){var e;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,Object(i["e"])();case 2:if(e=t.sent,1!=e.status){t.next=9;break}localStorage.removeItem("token"),localStorage.removeItem("username"),location.reload(),t.next=11;break;case 9:return this.$Message.error("退出失败！"),t.abrupt("return");case 11:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}()}},c=o,l=a("2877"),u=Object(l["a"])(c,s,n,!1,null,"37fb5be0",null);e["a"]=u.exports},bfd0:function(t,e,a){t.exports=a.p+"img/logo.c198210a.jpg"}}]);