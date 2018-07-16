<template>
    <div class="container" style="margin: 80px auto;">
        <div class="alert alert-danger" role="alert" v-if="hasError">
            {{ form.errorMessage }}
        </div>
        <div class="alert alert-success" role="alert" v-if="success">
            Here is a success message!
        </div>
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    placeholder="Enter first and last name"
                    autocomplete="name"
                    v-model="form.name"
                    :class="{'border border-danger': errorCode === 'name_required'}"
                    autofocus
                >
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter your email address"
                    autocomplete="email"
                    :class="{'border border-danger': errorCode === 'email_required'}"
                    v-model="form.email"
                >
            </div>
            <div class="form-group">
                <label for="max-width">Max Buildable Width</label>
                <input
                    type="text"
                    class="form-control"
                    id="max-width"
                    v-model="form.maxWidth"
                >
            </div>
            <div class="form-group">
                <label for="max-depth">Max Buildable Depth</label>
                <input
                    type="text"
                    class="form-control"
                    id="max-width"
                    v-model="form.maxDepth"
                >
            </div>
            <div class="form-group">
                <label for="bedrooms">Number of bedrooms</label>
                <input
                    type="number"
                    class="form-control"
                    id="bedrooms"
                    v-model="form.bedrooms"
                >
            </div>
            <div class="form-group">
                <label for="bathrooms">Number of bathrooms</label>
                <input
                    type="number"
                    class="form-control"
                    id="bathrooms"
                    v-model="form.bathrooms"
                >
            </div>
            <div class="form-group">
                <label for="comments">Additional Information</label>
                <textarea
                    class="form-control"
                    id="comments"
                    rows="3"
                    v-model="form.comments"
                >
                </textarea>
            </div>
            <fieldset class="form-group">
                <legend>Elevator</legend>
                <div class="form-check">
                    <label class="form-check-label">
                        <input
                            type="radio"
                            class="form-check-input"
                            name="elevator"
                            id="elevator1"
                            value="No"
                            checked
                            v-model="form.elevator"
                        >
                        No
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input
                            type="radio"
                            class="form-check-input"
                            name="elevator"
                            id="elevator2"
                            value="Yes"
                            v-model="form.elevator"
                        >
                        Yes
                    </label>
                </div>
            </fieldset>
            <fieldset class="form-group">
                <legend>Flood Zone</legend>
                <div class="form-check">
                    <label class="form-check-label">
                        <input
                            type="radio"
                            class="form-check-input"
                            name="floodzone"
                            id="floodzone1"
                            value="No"
                            checked
                            v-model="form.floodZone"
                        >
                        No
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input
                            type="radio"
                            class="form-check-input"
                            name="floodzone"
                            id="floodzone2"
                            value="Yes"
                            v-model="form.floodZone"
                        >
                        Yes
                    </label>
                </div>
            </fieldset>
            <button
                type="submit"
                class="btn btn-primary"
                @click.prevent="formSubmitted"
            >
                Submit
            </button>
        </form>
    </div>
</template>

<script>
    import permitForm from '../models/permit-form';
    export default {
        data () {
            return {
                form: new permitForm({
                    name: '',
                    email: '',
                    maxWidth: '',
                    maxDepth: '',
                    bedrooms: '',
                    bathrooms: '',
                    elevator: 'No',
                    floodZone: 'No',
                    comments: '',
                    url: '/wp-json/kerigansolutions/v1/submit-permit-form'
                }),
            }
        },
        computed: {
            hasError: function() {
                return this.form.hasError;
            },
            errorCode: function () {
                return this.form.errorCode;
            },
            success: function () {
                return this.form.success;
            }
        },
        methods: {
            formSubmitted () {
                this.form.submit();
            }
        }
    }
</script>

<style>

</style>
