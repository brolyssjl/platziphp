
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

const app = new Vue({
  el: '#app',
  data: {
    items: [],
    pagination: {
      total: 0,
      per_page: 2,
      from: 1,
      to: 0,
      current_page: 1
    },
    offset: 4,
    formErrors: {},
    formErrorsUpdate: {},
    newItem: {'title':'','description':''},
    fillItem: {'title':'','description':'','id':''}
  },
  computed: {
    isActived: function () {
      return this.pagination.current_page;
    },
    pagesNumber: function () {
      if (!this.pagination.to) {
        return [];
      }
      var from = this.pagination.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }
      var to = from + (this.offset * 2);
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }
      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    }
  },
  mounted: function(){
    this.getVueItems(this.pagination.current_page);
  },
  methods: {
    getVueItems: function(page){
      var vue = this;
      vue.$http.get('/vueitems?page='+page).then((response) => {
        vue.$set('items', response.data.data.data);
        vue.$set('pagination', response.data.pagination);
      });
    },
    createItem: function(){
      var vue = this;
      var input = this.newItem;
      vue.$http.post('/vueitems',input).then((response) => {
        vue.changePage(this.pagination.current_page);
        vue.newItem = {'title':'','description':''};
        $("#create-item").modal('hide');
        toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
      }, (response) => {
        vue.formErrors = response.data;
      });
    },
    deleteItem: function(item){
      var vue = this;
      vue.$http.delete('/vueitems/'+item.id).then((response) => {
        vue.changePage(this.pagination.current_page);
        toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
      });
    },
    editItem: function(item){
      this.fillItem.title = item.title;
      this.fillItem.id = item.id;
      this.fillItem.description = item.description;
      $("#edit-item").modal('show');
    },
    updateItem: function(id){
      var vue = this;
      var input = this.fillItem;
      vue.$http.put('/vueitems/'+id,input).then((response) => {
        vue.changePage(this.pagination.current_page);
        vue.fillItem = {'title':'','description':'','id':''};
        $("#edit-item").modal('hide');
        toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
      }, (response) => {
        vue.formErrorsUpdate = response.data;
      });
    },
    changePage: function (page) {
      this.pagination.current_page = page;
      this.getVueItems(page);
    }
  }
});
