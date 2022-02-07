import App from './vue/app';
import Display from './vue/display';

export default {
	mode: "history",
	routes: [
		{
			path: '/',
			component: App,
			name: 'home',
			
		},
		{
			path: '/display/:id',
			component: Display,
			name: 'display'
		},
		 
	]
}