if(!self.define){let e,s={};const i=(i,c)=>(i=new URL(i+".js",c).href,s[i]||new Promise((s=>{if("document"in self){const e=document.createElement("script");e.src=i,e.onload=s,document.head.appendChild(e)}else e=i,importScripts(i),s()})).then((()=>{let e=s[i];if(!e)throw new Error(`Module ${i} didn’t register its module`);return e})));self.define=(c,a)=>{const n=e||("document"in self?document.currentScript.src:"")||location.href;if(s[n])return;let r={};const o=e=>i(e,n),d={module:{uri:n},exports:r,require:o};s[n]=Promise.all(c.map((e=>d[e]||o(e)))).then((e=>(a(...e),r)))}}define(["./workbox-c3e7b101"],(function(e){"use strict";self.addEventListener("message",(e=>{e.data&&"SKIP_WAITING"===e.data.type&&self.skipWaiting()})),e.precacheAndRoute([{url:"favicon.ico",revision:"d41d8cd98f00b204e9800998ecf8427e"},{url:"images/icons/icon-128x128.png",revision:"ae3b5bc0dda2bc33633613a9f180d405"},{url:"images/icons/icon-144x144.png",revision:"86a462d7ebe4357dcd8fe8f1ef189e0c"},{url:"images/icons/icon-152x152.png",revision:"b014152aeef99d0b48b22e937f8c428e"},{url:"images/icons/icon-192x192.png",revision:"45a5eb39485adcfbc4dae9fcc0f44205"},{url:"images/icons/icon-384x384.png",revision:"b2e6afd209386af3da32c93459952def"},{url:"images/icons/icon-512x512.png",revision:"d4f43da37b9552ea1861369337914bbb"},{url:"images/icons/icon-72x72.png",revision:"a0501849ce7e29dbdcd4403db6d13ff6"},{url:"images/icons/icon-96x96.png",revision:"c5b7d5dc3a810696b8f2de94fc583949"},{url:"images/icons/splash-1125x2436.png",revision:"235cbb108d2a88597664f808c75cd6e0"},{url:"images/icons/splash-1242x2208.png",revision:"e72e43e4e0a8fdd99a1b9d4d7df062f0"},{url:"images/icons/splash-1242x2688.png",revision:"d30f101d7de25492fdf578227ccc0442"},{url:"images/icons/splash-1536x2048.png",revision:"0b0872d56f11b44a9f92c5dfedea14e4"},{url:"images/icons/splash-1668x2224.png",revision:"7909e0ef41ae90b8df710fafa5547484"},{url:"images/icons/splash-1668x2388.png",revision:"6b03cf284c8c59558ff0fe64e075616c"},{url:"images/icons/splash-2048x2732.png",revision:"00f72dab7447450081675ec4705681ee"},{url:"images/icons/splash-640x1136.png",revision:"9d6a5d631139366a24eb12b749ded900"},{url:"images/icons/splash-750x1334.png",revision:"71cf8da3d6234a69c41110088d260b18"},{url:"images/icons/splash-828x1792.png",revision:"affc6828a849d64de6270d6753d7439e"},{url:"images/logo-sumy@2x.png",revision:"f18291bed427c81f28c3653197158823"},{url:"images/logo-sumy@2xwhite.png",revision:"a952426263679537be794d2d1c3b1f92"},{url:"images/sumy-img1.png",revision:"8f25173345ec341963885ede355586f8"},{url:"images/ve-ico1.png",revision:"5e63b625f74c941d9a6e0a3f835c3414"},{url:"images/ve-ico2.png",revision:"f80d7f8001b7682a92200d9b94220acb"},{url:"images/ve-ico3.png",revision:"e287f37cdeddf1aa867f0970d2ab38b5"},{url:"images/venta-empresa.jpg",revision:"b4d04aeb5f382b34b1a2028d3e33dcc1"},{url:"js/jquery-3.7.0.min.js",revision:"4fcf018b5c604c47ae980185cf0167c2"},{url:"js/serviceworker.js",revision:"5d589cefab8469b403089b97515fdd92"},{url:"manifiest.json",revision:"54989eca57e11e04dcf0abc3e9c24c65"},{url:"pwa/assets/favicon.ico",revision:"556f31acd686989b1afcf382c05846aa"},{url:"pwa/assets/img/bg-mobile-fallback.jpg",revision:"d059e7034a69b426c73e53aa7dbc6266"},{url:"pwa/css/bootstrap.min.css",revision:"c72f441f0a2f2221077953cdcdaca032"},{url:"pwa/css/styles.css",revision:"f115714b7ceca481330dc7174f701724"},{url:"pwa/css/theme.css",revision:"1709edc660f7135bbbd3684fc996a193"},{url:"pwa/firebase-messaging-sw.js",revision:"a48b5ffaaa5c183ade0bf9beb0159213"},{url:"pwa/js/bootstrap.min.js",revision:"6958fc5642d2ac07eb5073169d6fa020"},{url:"pwa/js/enable-push.js",revision:"998d2fc88e0ed38e8df732203c111edd"},{url:"pwa/js/jquery.min.js",revision:"08b2631e87605807f288bc50b0be5c58"},{url:"pwa/js/scripts.js",revision:"dae7e7f09c3dd89b4559203c8c2c70f3"},{url:"serviceworker.js",revision:"9e55d2c7a6a13f5bfce2aeeaff89c233"}],{ignoreURLParametersMatching:[/^utm_/,/^fbclid$/]})}));
//# sourceMappingURL=sw.js.map