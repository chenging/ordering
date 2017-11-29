import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from 'vue-axios';
import qs from 'qs';
import './src/config/auto-size';

import WeuiDistpciker from 'weui-distpicker';
//地区选择插件
Vue.component('weui-distpicker', WeuiDistpciker);

//处理IE promise兼容性
require('es6-promise').polyfill();
require('es6-promise/auto');


//引入入口文件
import App from './App.vue';
//引入路由文件
import routes from './src/config/router';
//使用路由及axios请求
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
// 使用配置文件规则
const router = new VueRouter({
    routes
});
/*
  参数说明：
  obj：自定义需要传递给后台的参数对象，如let obj={name:'xxxx',age:'xxx'}

  method: http请求方式


  url：需请求的后台接口地址
*/
//封装全局http请求函数
Vue.prototype.publicHttp = (obj = {}, method, url, callback) => {
    Vue.axios({
        method: method,
        url: '/Home'+url,
        data: qs.stringify(obj)
    }).then((res) => {
        callback(res);
    }).catch((err) => {
        weui.confirm('请求错误，请稍候再试！');
    })
};

//挂载实例
new Vue({
    el: '#app',
    router: router,
    render: h => h(App)
});
