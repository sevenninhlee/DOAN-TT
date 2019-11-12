import Vue from 'vue'
import Router from 'vue-router'
import Home from '../views/Home'
import Signup from '../views/authentication/Signup'
import SignupConfirm from '../views/authentication/SignupConfirm'
import Login from '../views/authentication/Login'
import ForgotPassword from '../views/authentication/ForgotPassword'
import ResetPassword from '../views/authentication/ResetPassword'
import UploadDocument from '../views/documents/Upload'

import Terms from '../views/cms/Terms'
import Privacy from '../views/cms/Privacy'
import Recipient from '../views/documents/Recipient'
import Document from '../views/documents/Document'
import DocumentVerify from '../views/documents/DocumentVerify'
import Review from '../views/documents/Review'



Vue.use(Router)

export default new Router({
    // mode: 'history',
    routes: [
        {
            path: '/signup',
            name: 'Signup',
            component: Signup
        },
        {
            path: '/signup/:email',
            name: 'SignupC',
            component: Signup
        },
        {
            path: '/signup/confirm/:token',
            name: 'Confirm',
            component: SignupConfirm
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/login/:email',
            name: 'LoginC',
            component: Login
        },
        {
            path: '/password/forgot',
            name: 'ForgotPassword',
            component: ForgotPassword
        },
        {
            path: '/password/reset/:token',
            name: 'ResetPassword',
            component: ResetPassword
        },
        {
            path: '/documents/add',
            name: 'UploadDocument',
            component: UploadDocument
        },
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/terms',
            name: 'Terms',
            component: Terms
        },
        {
            path: '/privacy',
            name: 'Privacy',
            component: Privacy
        },
        {
            path: '/recipient',
            name: 'Recipient',
            component: Recipient
        },
        {
            path: '/document',
            name: 'Document',
            component: Document
        },
        {
            path: '/documentverfiy',
            name: 'DocumentVerify',
            component: DocumentVerify
        },
        {
            path: '/review',
            name: 'Review',
            component: Review
        }
        
    ]
})
