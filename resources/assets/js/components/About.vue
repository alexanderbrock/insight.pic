<template>
    <div class="register-photo">
        <alert v-if="flag==1" v-bind:message="msg"></alert>
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="post" v-on:submit.prevent="SendInfo">
                <h2 class="text-center">About Insights.pics</h2>
                <p>Insights.pics was built for and by customers of the Insights Discovery program. While we are not afflicated with The Insights Group Ltd, we are beilevers in the program and have created this tool to assist organizations to realized the
                    benefits of the program.</p>
                <input class="form-control" type="text" name="name" id="name" placeholder="Name" required>
                <input class="form-control" type="email" name="email" id="email" placeholder="Email Address" required>
                <input class="form-control" type="text" name="message" id="message" placeholder="Message" required>
                <div class="checkbox">
                    <label class="control-label">
                        <input type="checkbox">Send me more information about your products and services.</label>
                </div>
                <button class="btn btn-default btn-block">Send </button>
                <a href="#" class="already">You already have an account? Login here.</a>
            </form>
        </div>
    </div>
</template>
<script>
    import Alert from './Alert.vue'
    export default{
        mounted(){

        },
        data(){
            return {
                msg:'',
                flag:0
            }
        },
        components: {
            'alert': Alert,
        },
        methods : {
            SendInfo:function(e){
                var self=this;
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url:'/api/sendmsg',
                    data:{name:$('#name').val(),email:$('#email').val(),message:$('#message').val()},
                    success:function(res){
                        if(res=="success"){
                            self.flag=1;
                            self.msg="Your mail send successly"
                        }
                    }
                });
            }
        }
    }
</script>
