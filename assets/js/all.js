!function(){"use strict";var e,t={356:function(e,t,n){var o=n(665);document.addEventListener("DOMContentLoaded",(function(){new o.ZP("#ntfslider",{modules:[o.tl,o.lI,o.pt],effect:"coverflow",grabCursor:!0,centeredSlides:!0,slidesPerView:"auto",slideToClickedSlide:!0,coverflowEffect:{rotate:0,stretch:20,depth:300,modifier:1.4,slideShadows:!1},autoplay:{delay:1500,pauseOnMouseEnter:!0},speed:1e3,initialSlide:4,loop:!0,pagination:{el:".swiper-pagination",clickable:!0},breakpoints:{1199:{coverflowEffect:{rotate:0,stretch:0,depth:300,modifier:1.2,slideShadows:!1}}}})}));var i=n(650);document.addEventListener("DOMContentLoaded",(function(){var e=document.querySelector("button[data-openmobilemenu]"),t=document.querySelectorAll("[data-closemobilemenu]"),n=e.nextElementSibling;e.addEventListener("click",(function(){document.body.classList.add("is--noscroll"),n.classList.add("is--active")})),t.forEach((function(e){e.addEventListener("click",(function(){document.body.classList.remove("is--noscroll"),n.classList.remove("is--active")}))})),i.Z.init(),document.querySelectorAll("button[data-openmodalform='simple']").forEach((function(e){e.addEventListener("click",(function(){var e=this;i.Z.show("modal-consultation",{onShow:function(t){document.querySelector(".consultation__user-classes").classList.add("is--hidden"),document.querySelector(".consultation__user-countries").classList.add("is--hidden"),t.querySelector(".modal__title").textContent=e.dataset.formtitle,t.querySelector(".hidden-field").value=e.dataset.formtitle},disableScroll:!0})}))})),document.addEventListener("wpcf7submit",(function(e){var t=e.detail.inputs;console.info(t)}),!1)}));var r=n(248),a=n(2),c=n.n(a);document.addEventListener("DOMContentLoaded",(function(){document.querySelectorAll(".card").forEach((function(e){try{var t=r.loadAnimation({container:e.querySelector(".card__icon"),renderer:"svg",loop:!1,autoplay:!1,path:e.querySelector(".card__icon").dataset.iconpath});e.addEventListener("mouseenter",(function(){e.classList.add("is--bigger"),t.goToAndPlay(0,!0)})),e.addEventListener("mouseleave",(function(){e.classList.remove("is--bigger")}))}catch(e){}})),document.querySelectorAll(".advantage__text, .article-content li").forEach((function(e){e.addEventListener("mouseenter",(function(){this.classList.add("is--hovered")})),e.addEventListener("webkitAnimationEnd",(function(){this.classList.remove("is--hovered")}))}));var e=document.querySelectorAll('.sticky-nav-item > a[href*="#"]');e.forEach((function(t){t.dataset.scroll="",t.addEventListener("click",(function(){e.forEach((function(e){e.parentElement.classList.remove("is--active")})),this.parentElement.classList.add("is--active")}))})),new(c())('.sticky-nav-item > a[href*="#"]',{speed:500,updateURL:!1,offset:30})}))}},n={};function o(e){var i=n[e];if(void 0!==i)return i.exports;var r=n[e]={exports:{}};return t[e].call(r.exports,r,r.exports,o),r.exports}o.m=t,o.amdO={},e=[],o.O=function(t,n,i,r){if(!n){var a=1/0;for(l=0;l<e.length;l++){n=e[l][0],i=e[l][1],r=e[l][2];for(var c=!0,s=0;s<n.length;s++)(!1&r||a>=r)&&Object.keys(o.O).every((function(e){return o.O[e](n[s])}))?n.splice(s--,1):(c=!1,r<a&&(a=r));if(c){e.splice(l--,1);var d=i();void 0!==d&&(t=d)}}return t}r=r||0;for(var l=e.length;l>0&&e[l-1][2]>r;l--)e[l]=e[l-1];e[l]=[n,i,r]},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,{a:t}),t},o.d=function(e,t){for(var n in t)o.o(t,n)&&!o.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},o.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={617:0};o.O.j=function(t){return 0===e[t]};var t=function(t,n){var i,r,a=n[0],c=n[1],s=n[2],d=0;if(a.some((function(t){return 0!==e[t]}))){for(i in c)o.o(c,i)&&(o.m[i]=c[i]);if(s)var l=s(o)}for(t&&t(n);d<a.length;d++)r=a[d],o.o(e,r)&&e[r]&&e[r][0](),e[r]=0;return o.O(l)},n=self.webpackChunkwp_gulp=self.webpackChunkwp_gulp||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))}();var i=o.O(void 0,[216],(function(){return o(356)}));i=o.O(i)}();