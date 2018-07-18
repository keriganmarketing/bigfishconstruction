import axios from 'axios';

export default class ContactForm {

    constructor (data) {
        for (let field in data) {
            this[field]       = data[field];
            this.hasError     = false;
            this.errorMessage = "";
            this.errorCode    = "";
            this.success      = false;
        }
    }
    submit () {
        axios.post(this.url, {
            name:      this.name,
            email:     this.email,
            comments:  this.comments,
        }).then(() => {
            this.success = true;
            this.clearForm();
        }).catch(err => {
            this.hasError     = true;
            this.errorMessage = err.response.data.message;
            this.errorCode    = err.response.data.code;
        });
    }
    clearForm() {
        this.name      = "";
        this.email     = "";
        this.comments  = "";
    }
}