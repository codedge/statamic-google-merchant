<template>
    <div>
        <select-input
            :handle="config.handle"
            :value="value"
            :options="conditions"
            @input="update"
        ></select-input>
    </div>
</template>

<script>
export default {
    mixins: [Fieldtype],
    data() {
        return {
            conditions: this.meta.conditions
        };
    }
};
</script>
