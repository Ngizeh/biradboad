<template>
    <div class="card mb-3">
        <div class="flex items-center">
            <input type="text" name="body" class="w-full"
                   :class="[form.completed ? 'text-gray-300' : '']"
                   @keyup.enter="updateTask"
                   v-model="form.body">
            <input type="checkbox" name="completed"
                   @change="updateTask"
                   v-model="form.completed"
                   :id="form.id"
                   :checked="form.completed ? 'checkbox' : ''"
            >
        </div>
    </div>
</template>
<script>
export default {
    props : {
        task : Object,
        project : Object,
        value : {
            default : null
        }
    },
    data() {
        return {
            form :  this.task,
        }
    },
    methods : {
        updateTask(){
            this.$inertia.patch(this.route('tasks.update',[this.project, this.task]), this.form)
        },
    },
}
</script>

