<template>
    <div>
        <div class="mb-1 content">
            <h2 class="text-base">
                {{ __('gm::cp.general') }}
            </h2>
        </div>

        <publish-fields-container class="card p-0 mb-3 configure-section">

            <form-group
                class="toggle-fieldtype"
                fieldtype="toggle"
                handle="enabled"
                :display="__('gm::cp.settings.enabled')"
                :instructions="__('gm::cp.settings.enabled_instructions')"
                v-model="enabled"
            />

        </publish-fields-container>

        <div class="mb-1 content">
            <h2 class="text-base">
                {{ __('gm::cp.settings.collection') }}
                <button class="btn-sm" @click="this.addCollection">
                    + {{ __('gm::cp.settings.add_collection') }}
                </button>
            </h2>
        </div>

        <publish-fields-container class="card p-0 mb-3 configure-section">
            <div v-for="(c, index) in this.countCollections">
                <form-group
                    class="border-b field"
                    handle="collections[]"
                    :display="__('gm::cp.settings.collection')"
                    :errors="errors.collections"
                    :instructions="__('gm::cp.settings.collection_instructions')"
                    v-model="collections[index]"
                />
            </div>
        </publish-fields-container>

        <div class="py-2 mt-3 border-t flex justify-between">
            <a :href="indexUrl" class="btn" v-text="__('Cancel') "/>
            <button type="submit" class="btn-primary" @click="save">{{ __('Save') }}</button>
        </div>

    </div>
</template>

<script>
export default {
    props: {
        action: String,
        initialEnabled: {
            type: Boolean,
            required: true,
        },
        initialCollections: {
            type: Array,
            required: false,
        },
        indexUrl: {
            type: String,
            required: true,
        },
        method: {
            type: String,
            required: true
        },
    },

    data() {
        return {
            error: null,
            errors: {},
            enabled: this.initialEnabled,
            collections: this.initialCollections,
            countCollections: this.initialCollections.length + 1,
        }
    },

    computed: {
        hasErrors() {
            return this.error || Object.keys(this.errors).length;
        },

        payload() {
            return {
                enabled: this.enabled,
                collections: this.collections,
            }
        },
    },

    methods: {
        clearErrors() {
            this.error = null;
            this.errors = {};
        },

        addCollection() {
            this.countCollections += 1;
            console.log(this.countCollections);
        },

        save() {
            this.clearErrors();

            this.$axios[this.method](this.action, this.payload)
                .then(response => {
                    window.location = response.data.redirect;
                })
                .catch(e => {
                    if (e.response && e.response.status === 422) {
                        const { message, errors } = e.response.data;
                        this.error = message;
                        this.errors = errors;
                        this.$toast.error(message);
                    } else {
                        this.$toast.error(__('gm::cp.unable_to_save'));
                    }
                });
        }
    },

    mounted() {
        console.log(this.countCollections);
        this.$keys.bindGlobal(['mod+s'], e => {
            e.preventDefault();
            this.save();
        });
    }
}
</script>
