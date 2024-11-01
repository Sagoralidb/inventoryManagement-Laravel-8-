import * as actions from '../../action-types'
import * as mutations from '../../mutations-types'
// import axios, { Axios } from 'axios'
import Axios from 'axios'

export default {
    [actions.SUBMIT_RETURN_PRODUCT]({commit}, payload) {
        Axios.post('/return-product', payload)
        .then(res=>{
            if(res.data.success == true) {
                window.location.href = '/return-product'
            }
        })
        .catch(err=>{
            // console.log(err.response.data.errors)
            commit(mutations.SET_ERRORS, err.response.data.errors)
        })
    },

}
