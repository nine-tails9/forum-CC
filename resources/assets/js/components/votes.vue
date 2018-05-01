<template>
    <div class="panel-footer">
        <p><span class="text-success">Upvotes : {{ up }}</span>&nbsp;<span class="text-danger"> Downvotes : {{down}}</span></p>
            <div class="btn btn-success btn-s" @click = "increase" v-if="!upvoted">Up</div>
            <div class="btn btn-danger btn-s" @click = "decrease" v-if="!downvoted">Down</div>

    </div>
</template>

<script>
    export default {
        props: [
            'downcnt',
            'upcnt',
            'id',
            'user',
            'qid'
        ],
        created: function(){

            axios.get("http://www.cataliist.in/check/" + this.user).then((response)=>{
            
                    for(var i = 0; i < response.data[0].length; i++)
                        if(response.data[0][i].question_id == this.qid)
                        {  
                            if(response.data[0][i].upvoted == 1)this.upvoted = true;
                            if(response.data[0][i].downvoted == 1)this.downvoted = true;
                        }

            });


        },
        data(){

            return{

                upvoted: false,
                downvoted: false,
                up: this.upcnt,
                down:this.downcnt,
             
            }
        },

        methods: {

            increase: function(){

                this.up++;
                if(this.downvoted)this.down--;
                axios.post("http://www.cataliist.in/fetch/" + this.id + "/" + this.qid);
                axios.post("http://www.cataliist.in/upvote/" + this.qid);
                this.upvoted = true;
                this.downvoted = false;

            },

            decrease: function(){
                if(this.upvoted)this.up--;
                this.down++;
                axios.post("http://www.cataliist.in/fetch2/" + this.id + "/" + this.qid);
                axios.post("http://www.cataliist.in/downvote/" + this.qid);

                this.downvoted = true;
                this.upvoted = false;
            }
        }


    }
</script>
