<template>

  <div>
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-bell">
              <span class="badge" v-if = "cnt">{{cnt}}</span>
            </span>
            </a>
            <div class="dropdown-menu colo panel-default">
              <div class="panel-heading">Recent Notification</div>
              <div class="panel-body" v-for="x in notifications">
                {{x.message}}
              </div>
            </div>
  </div>
</template>

<script>
    export default {
        props: [
           
        ],
        created(){

            axios.get("/notifications").then((response)=>{
                this.notifications.push(response.data[0]);
                
                    for(var i = 0; i < response.data[0].length; i++)
                        this.notifications.push(response.data[0][i]);
                    
                this.cnt = this.notifications.length - 1;
            });

        },
        data(){

            return{

              notifications: [],

              cnt: '0'

            }
        },



    }
</script>
<style scoped>

.dropdown-menu {
    width: 300px !important;
}

</style>