<template>
    <div>
        <select-input
            :handle="config.handle"
            :value="value"
            :options="availabilities"
            @input="update"
        ></select-input>
    </div>
</template>

<script>
export default {
    mixins: [Fieldtype],
    data() {
        return {
            availabilities: this.meta.availabilities
        };
    }
};
</script>
