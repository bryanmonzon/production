<template>
    <div>
        <button class="btn btn-primary" v-if="!toggled" @click="toggle">New Plan</button>
        <form class="form-inline" @submit.prevent="addPlan" v-else>
            <div class="input-group mb-3">
              <input type="text" class="form-control" autofocus placeholder="New Plan Name" v-model="form.name">
              <div class="input-group-append">
                <button class="btn btn-primary" 
                    @click.prevent="addPlan" 
                    type="button" 
                    :disabled="validateFormName"
                >Save Plan</button>
              </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                toggled: false, 
                form: {
                    name: ''
                }
            }
        },
        computed: {
            validateFormName() {
                return this.form.name.length > 0 ? false : true
            }
        },
        methods: {
            toggle() {
                this.toggled = !this.toggled
            },
            addPlan() {

                if( !this.validateFormName ) {
                    axios.post('/plans', this.form)
                        .then(res => {
                            this.toggled = false;
                            this.form.name = ''

                            Bus.$emit('plan:added', res.data);
                        })
                        .catch(err => {
                            console.log(err)
                        })
                }
            }
        }
    }
</script>
