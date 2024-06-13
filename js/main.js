const { createApp } = Vue

const myConfig = {
	
	data() {
		
		return {
			todolist : [ "ciao"]
			
		}
	},
	methods: {
		getConsole(){
			console.log(this.todolist)
		}
	},
	mounted(){
		window.vue = this;
		axios.get("../server.php").then(results => {
			console.log("Risultati: ", results);
			this.todolist = results.data;
		})
	}
};

let app = Vue.createApp(myConfig);
app.mount('#app');