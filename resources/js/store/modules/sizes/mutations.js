import * as mutations from '../../mutations-types'

export  default {
    [mutations.SET_SIZES] (state, payload) {
        state.sizes = payload
    }
}
