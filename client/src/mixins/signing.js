import { post, put, remove, get } from '../utils/http'

export const signing = {
  methods: {
    /** SIGNATURE */
    getSignatures: function() {
      return get('signing/signs')
    },
    createSignature: function(data) {
      console.log('sfsd');
      
      return post('signing/signs', data)
    },
    uploadStamp: function(data) {
      return post('signing/stamp-upload', data)
    },
    getSignature: function(id) {
      return get('signing/signs/' + id)
    },
    softDeleteSignature: function(id) {
      return remove('signing/signs/'+id+'/delete')
    },
    destroySignature: function(id) {
      return remove('signing/signs/'+id+'/permanent')
    },
    
    /** Others */
    defaultSignature: function(id) {
      return get('signs-stamps/signs-default/'+id)
    }

    
  }
}
