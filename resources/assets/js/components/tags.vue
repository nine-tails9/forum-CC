<template>

        <div class="row" style="margin-bottom:10px;">
          <div class="col-lg-6">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Type Tag" v-model = "cur">
              <span class="input-group-btn">
                <button class="btn btn-info" type="button" @click = "add">Add Tag</button>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
          <div class="row">
              <h4><span class="label label-default" v-for = "tag in tags" style="margin:5px;">
                <input type="hidden" name="tags[]" :value = "tag"></input>{{ tag }}</span>
                </h4>
          </div>
        </div><!-- /.row -->
</template>

<script>
    export default {
        props: [
           
        ],
        data(){

            return{

             tags: [],
             cur: ""
            }
        },

        methods: {
            add: function(){

                this.tags.push(this.cur);
                this.cur = "";

            }
        }


    }
</script>
