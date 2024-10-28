import * as  mutations from '../../mutations-types'
export default {
    [mutations.SET_PRODUCTS] (state,payload){
        state.products = payload
    }
}
