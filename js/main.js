const { createApp } = Vue

const myConfig = {
	
	data() {
		
		return {
			todolist : [ "ciao"],
			addTask : null
			
		}
	},
	methods: {
		getDoit(index){
			console.log(this.todolist)
			if(this.todolist[index].state != 'doit'){
				this.todolist[index].state = 'doit'
			} else{
				this.todolist[index].state = 'loading'
			}
		},
		getAddTask(){
			let task = new Object({name : this.addTask, state : "loading"})
			this.todolist.push(task)
		}
	},
	mounted(){
		window.vue = this;
		axios.get("../php-todo-list-json/server.php").then(results => {
			console.log("Risultati: ", results);
			this.todolist = results.data;
		})
	}
};

let app = Vue.createApp(myConfig);
app.mount('#app');