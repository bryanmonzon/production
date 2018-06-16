<template>
    <div class="list-group-item d-flex justify-content-between align-items-center" :class="classObject">
        <span class="d-flex flex-wrap align-items-center concern-body-wrap">
            <div class="mr-2 concern-body">{{ concern.body }}</div>
            <span class="concern-date text-muted concern-author">{{concern.created_at | date }} <img :src="concern.user.avatar" class="concern-author-image rounded-circle mr-1"></span>
        </span>
        <span>
            <button class="btn btn-sm btn-outline-secondary" 
                @click="resolveConcern" 
                v-if="!this.resolved"
            >
                <i class="far fa-circle"></i>
            </button>
            <button class="btn btn-sm btn-success" 
                @click="resolveConcern" 
                v-else
            >
                <i class="far fa-check-circle"></i>
            </button>
            <button class="btn btn-sm btn-outline-danger" @click.prevent="deleteConcern(concern)">
                <i class="fal fa-minus-circle"></i>
            </button>
        </span>
    </div>
</template>

<script>
    export default {
        props: ['concern'],
        data() {
            return {
                resolved: this.concern.resolved
            }
        },
        computed: {
            classObject() {
                return {
                    'priority-4': this.concern.priority === 4,
                    'priority-3': this.concern.priority === 3,
                    'priority-2': this.concern.priority === 2,
                    'priority-1': this.concern.priority === 1,
                    'concern-resolved': this.resolved,
                    'owns-concern': this.concern.user.id === user.id
                }
            }
        },
        methods: {
            resolveConcern() {
                this.resolved = !this.resolved
                axios.patch(`/concerns/${this.concern.id}`, {
                    resolved: this.resolved
                })
                .then(res => {
                    Bus.$emit('concern:resolved', res.data)
                })
                .catch(err => {
                    console.log(err)
                })
            },
            deleteConcern(concern) {
                axios.delete(`/concerns/${this.concern.id}`)
                    .then(res => {
                        Bus.$emit('concern:deleted', concern)
                    })
                    .catch(err => {
                        console.log(err)
                    })
            }
        }
    }
</script>

<style>
    .priority-4 {
        border-left: 0px;
    }
    .priority-3 {
        border-left: 3px solid #17a2b8;
    }
    .priority-2 {
        border-left: 3px solid #ffc107;
    }
    .priority-1 {
        border-left: 3px solid #dc3545;
    }
    .concern-resolved .concern-body,
    .concern-resolved .concern-author {
        opacity: .5;
    }
    .slide-fade-enter-active {
      transition: all .3s ease;
    }
    .slide-fade-leave-active {
      transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active below version 2.1.8 */ {
      transform: translateX(10px);
      opacity: 0;
    }
    .concern-body-wrap {
        width:80%;
    }
    img.concern-author-image {
        height:20px;
        width:20px;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.10);
    }
</style>