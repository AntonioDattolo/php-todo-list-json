const { createApp } = Vue

const myConfig = {
	
	data() {
		
		return {
			todolist: ["ciao"],
			addTask: null,
			requestConfig: {
				headers: {
					'Content-Type': 'multipart/form-data'
				}
			}
			
		}
	},
	methods: {
		getDoit(index){
			console.log(this.todolist)
			if(this.todolist[index].state != true){
				this.todolist[index].state = true
			} else{
				this.todolist[index].state = false
			}
		},
		getAddTask(){
			let task = new Object({name : this.addTask, state : false})
			axios.post("../php-todo-list-json/server.php",task,this.requestConfig).then(results => {
				console.log("new Task :", results.data)
				this.todolist = results.data
			})
			this.addTask= null
		}
	},
	mounted(){
		window.vue = this;
		axios.get("../php-todo-list-json/server.php").then(results => {
			console.log("Risultati: ", results.data);
			this.todolist = results.data;
		})
	}
};

let app = Vue.createApp(myConfig);
app.mount('#app');