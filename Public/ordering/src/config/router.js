//SPA主页
import Index from '../components/index.vue';
export default [
    {
        path: '',
        components: {
            default:Index
        },
        redirect:'index',
        children: [
            {
                path: 'index',
                component: Index//默认一级路由
            }
        ]
    }
]