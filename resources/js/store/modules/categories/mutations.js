import * as mutations from '../../mutations-types'

export  default {
    [mutations.SET_CATEGORIES] (state, payload) {
        state.categories = payload
    }
}