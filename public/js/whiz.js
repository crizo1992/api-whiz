var vm = new Vue({
  el: '#app',
  mounted() {
  	  this.getList();
  },
  data: {
    whiz   : []    
  },
  computed : {
    listExiste: function () {
      if (this.whiz.length > 0) return true;
      else return false; 
    }
  },
  methods: {
    getList () {
      axios.get("api/whiz")
      .then((respuesta) => {
        console.log(respuesta.data);
        this.whiz = respuesta.data;
      });
    }  
  }
});