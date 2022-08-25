<div id="app">
  <input type="text" v-model="newTask">
  <button @click="addTask()">Thêm</button>
  <div v-for="(task, index) in tasks" :key="index">
    <input type="checkbox" v-model='task.done'>
    <span :class='{done: task.done}'>{{ task.content }}</span>
  </div>
  <input type="number" v-model="num">
  <span>{{num * 20000}}</span>
</div>

<script>
  const { createApp } = Vue
  createApp({
    data() {
      return {
        newTask: '',
        num:1,
        tasks: [
          {content:'Ăn', done: false},
          {content:'Ngủ', done: false},
          {content:'Code', done: false},
          {content:'Vệ sinh', done: false},
        ]
      }
    },
    methods:{
      addTask: function(){
        this.tasks.push({
          content: this.newTask,
           done: false
        });
      },
    },
    watch:{
      num : function(){
        console.log('New task changed');
      }
    }
  }).mount('#app')
</script>
<style>
  .done{
    text-decoration: line-through;
  }
</style>