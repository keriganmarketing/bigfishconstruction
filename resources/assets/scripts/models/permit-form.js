import axios from 'axios';

export default class PermitForm {
    constructor (data) {
        for (let field in data) {
            this[field] = data[field];
        }
    }
}