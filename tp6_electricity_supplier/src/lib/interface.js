/*
接口请求函数模块
返回值: promise对象
 */
import { post, get, put } from './http'

// 跨域请求服务器变更地址
const url = process.env.NODE_ENV === 'production'
  ? '' //这里是正式环境地址
  : '/api'; //这里是本地代理地址，代理地址修改的文件在根目录下的vue.config.js文件中，将其中的域名更改为本地自己开发服务器API地址即可。
// const url = get(/api/list);
// console.log(url);
//发送验证码      以获取
export const smscode = (data) => post(url + "/Alismscode", data);
//登录 以获取
export const login = (data) => post(url + "/login/index", data);
//退出登录     以获取
export const logout = (data) => get(url + "/logout/index", data);
//获取用户基本信息
export const user = (data) => get(url + "/user", data);
export const updateUser = (data) => put(url + "/user/updateUser", data);
//获取分类
export const category = (data) => get(url + "/category/index", data);
//获取banner     以获取
export const banner = (data) => get(url + "/index/getRotationChart", data);
//获取首页推荐
export const goodsRecommend = (data) => get(url + "/index/categoryGoodsRecommend", data);
// -------------------------------------------
//获取分类sku
export const sku = (data) => get(url + "api/sku", data);
//获取分类列表中 二三级分类数据
export const categorySearch = (data) => get(url + "/category/search/" + data.id);

//根据分类ID获取子分类
export const subcategory = (data) => get(url + "api/subcategory/" + data.id);
//获取分类页面  商品列表
export const lists = (data) => get(url + "/lists/index", data);

//搜索关键词
export const searchTop = (data) => get(url + "api/mall.recommend/searchTop", data);
//商品详情
export const detail = (data) => get(url + "api/detail/" + data.id);
//推荐商品
export const recommend = (data) => get(url + "api/mall.recommend");
//加入购物车
export const addCart = (data) => post(url + "api/cart/add", data);
//购物车列表
export const cartList = (data) => get(url + "api/cart/lists", data);
//购物车列表
export const deleteCart = (data) => post(url + "api/cart/delete", data);
//修改购物车数量
export const updateCart = (data) => post(url + "api/cart/update", data);
//购物车总数
export const cartCount = (data) => post(url + "api/mall.init", data);
//用户地址
export const address = (data) => get(url + "api/address", data);
//提交订单
export const order = (data) => post(url + "api/order", data);
//获取订单信息
export const orderList = (data) => get(url + "api/order", data);
//获取订单详情
export const orderInfo = (data) => get(url + "api/order/" + data.id);
//获取订单详情
export const doOrder = (data) => put(url + "api/order/" + data.id, {"type": data.type});
//支付
export const pay = (data) => post(url + "api/pay", data);
//支付结果查询
export const payQuery = (data) => get(url + "api/order.async/queryState", data);
