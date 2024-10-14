import * as mutations from '../../mutations-types'

export  default {
    [mutations.SET_BRANDS] (state, payload) {
        state.brands = payload
    }
}
