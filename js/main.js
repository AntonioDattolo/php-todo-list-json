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
			},
			requestDelete:{
				headers:{
					'Content-Type': 'null'
				}
			}
			
		}
	},
	methods: {
		getDoit(index){
			console.log(this.todolist)
			if(this.todolist.todolist[index].state != true){
				this.todolist.todolist[index].state = true
			} else{
				this.todolist.todolist[index].state = false
			}
		},
		getAddTask(){
			let task = new Object({name : this.addTask, state : false, deleted : false})
			axios.post("../php-todo-list-json/server.php",task,this.requestConfig).then(results => {
				console.log("new Task :", results.data)
				this.todolist = results.data
			})
			this.addTask= null
		},
		makeDeleteTask(index){
			this.todolist.todolist[index].deleted = true
			const indexToDelete ={
				indice : index
			}
			console.log(index)
			axios.post("../php-todo-list-json/server.php",indexToDelete, this.requestConfig).then(results => {
				console.log("dentro la chiamata" ,indexToDelete)
				console.log("new Task :", results.data)
				this.todolist = results.data
			})
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