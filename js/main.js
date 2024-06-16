const { createApp } = Vue

const myConfig = {
	
	data() {
		
		return {
			todolist: [],
			addTask: null,
			serverUrl : "../php-todo-list-json/server.php",
			requestConfig: {
				headers: {
					'Content-Type': 'multipart/form-data'
				}
			},
			
		}
	},
	methods: {
		serverRequest(elementRequest){
			axios.post(this.serverUrl,elementRequest, this.requestConfig).then(results => {
				this.todolist = results.data
			})
		},

		getDoit(index){
			if(this.todolist.todolist[index].state != true){
				this.todolist.todolist[index].state = true
			} else{
				this.todolist.todolist[index].state = false
			}
			const stateToUpdate ={
				indexToChange : index,
				stateToChange : this.todolist.todolist[index].state
			}
			this.serverRequest(stateToUpdate)
		},
		getAddTask(){
			let task = new Object({name : this.addTask, state : false, deleted : false})
			this.serverRequest(task)
			this.addTask= null
		},
		makeSoftDeleteTask(index){
			this.todolist.todolist[index].deleted = true
			const indexToDelete ={
				softDelete : index
			}
			this.serverRequest(indexToDelete)
		},
		makeHardDelete(index){
			const indexToDelete ={
				hardDelete: index
			}
			this.serverRequest(indexToDelete)
		},
		resetTask(index){
			this.todolist.cestino[index].deleted = false
			const indexToRestore ={
			 	restoration : index
			}
			this.serverRequest(indexToRestore)
		}
	},
	mounted(){
		window.vue = this;
		axios.get(this.serverUrl).then(results => {
			this.todolist = results.data;
		})
	}
};

let app = Vue.createApp(myConfig);
app.mount('#app');