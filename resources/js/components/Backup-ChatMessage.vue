<template>
    <div class="row"  style=" width: 1100px; ">
      <div class="col-md-2 myUser">
          <ul class="user">
             <strong>Chat List</strong>
             <hr>

          <li v-for="(user, index) in users" :key="index">
            <a href="" @click.prevent="userMessage(user.id)">
              <img v-if="user.role === 'user'" :src="'http://localhost/learning/easylearningbd/lms/public/upload/user_images/'+user.photo"
                alt="UserImage"
                class="userImg"
              />

              <img v-else :src="'http://localhost/learning/easylearningbd/lms/public/upload/instructor_images/'+user.photo"
                alt="UserImage"
                class="userImg"
              />
              <span class="username text-center"> {{ user.name }}</span>
            </a>
          </li>

        </ul>
      </div>

      <div class="col-md-10" v-if="allmessages.user">
        <div class="card">
          <div class="card-header text-center myrow">
            <strong> Selected {{ allmessages.user.name }}</strong>
          </div>
          <div class="card-body chat-msg">
            <ul class="chat" v-for="(msg, index) in allmessages.messages" :key="index">

             <li class="sender clearfix" v-if="allmessages.user.id === msg.sender_id">
                <span class="chat-img left clearfix mx-2">
                <img :src="'http://localhost/learning/easylearningbd/lms/public/upload/instructor_images/'+msg.user.photo"
                    class="userImg"
                    alt="userImg"
                  />
                </span>
                <div class="chat-body2 clearfix">
                  <div class="header clearfix">
                      <small class="right text-muted">
                        {{ msg.created_at }}
                      </small>
                    <strong class="primary-font">{{ msg.user.name }}</strong>
                  </div>
                  <p>{{ msg.msg }}</p>
                </div>
              </li>

          <!-- my part  -->
              <li class="buyer clearfix">
                <span class="chat-img right clearfix mx-2">
                  <img src="/frontend/avatar-4.png"
                    class="userImg"
                    alt="userImg"
                  />
                   </span>
                <div class="chat-body clearfix">
                  <div class="header clearfix">
                    <small class="left text-muted"
                      >12:10pm</small>
                    <!-- <strong class="right primary-font">Myusername </strong> //my name   -->
                     <div class="text-center">
                        Product name
                     <img src="/frontend/avatar-5.png"
                        alt="prouductImage"
                        width="60px;"
                      />
                    </div>
                  </div>
                  <p>Hello...</p>
                </div>
              </li>

              <li class="sender clearfix">
                <span class="chat-img left clearfix mx-2"> </span>
              </li>

            </ul>
          </div>
          <div class="card-footer">
            <div class="input-group">
              <input
                id="btn-input"
                type="text"
                v-model="msg"
                class="form-control input-sm"
                placeholder="Type your message here..."
              />
              <span class="input-group-btn">
                <button class="btn btn-primary" @click.prevent="sendMsg()">Send</button>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

  <script>
import axios from 'axios';

  export default {

    data(){
        return {
            users: {},
            allmessages: {},
            selectedUser: '',
            msg: '',
        }
    },

    created(){
        this.getAllUser();
    },

    methods: {
        getAllUser(){
            axios.get('http://localhost/learning/easylearningbd/lms/user-all')
            .then((res)=> {
                this.users = res.data;
            }).catch((err) => {

            });
        },

        userMessage(userId){
            axios.get('http://localhost/learning/easylearningbd/lms/user-message/'+userId).then((res) => {

                this.allmessages = res.data;
                this.selectedUser = userId;
            }).catch((err) => {

             });
        },

        sendMsg(){
            axios.post("http://localhost/learning/easylearningbd/lms"+"/send-message", { receiver_id: this.selectedUser, msg: this.msg })
            .then((res) => {
                this.msg = "";
                this.userMessage(this.selectedUser);
                console.log(res.data);
            }).catch((err) => {
                this.errors = err.response.data.errors;
            })
        },
    }

  };
  </script>
  <style>

  .username {
    color: #000;
  }

  .myrow{
      background: #F3F3F3;
      padding: 25px;
  }

  .myUser{
       padding-top: 30px;
       overflow-y: scroll;
      height: 450px;
      background: #F2F6FA;
  }
  .user li {
    list-style: none;
    margin-top: 20px;

  }

  .user li a:hover {
    text-decoration: none;
    color: red;
  }
  .userImg {
    height: 35px;
    border-radius: 50%;
  }
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 40px;
    padding-bottom: 5px;
    margin-top: 20px;
    width: 80%;
    height: 10px;
  }

  .chat li .chat-body p {
    margin: 0;
  }

  .chat-msg {
    overflow-y: scroll;
    height: 350px;
    background: #F2F6FA;
  }
  .chat-msg .chat-img {
    width: 100px;
    height: 100px;
  }
  .chat-msg .img-circle {
    border-radius: 50%;
  }
  .chat-msg .chat-img {
    display: inline-block;
  }
  .chat-msg .chat-body {
    display: inline-block;
    max-width: 45%;
    margin-right: -73px;
    background-color: #891631;
    border-radius: 12.5px;
    padding: 15px;
  }
  .chat-msg .chat-body2 {
    display: inline-block;
    max-width: 80%;
    margin-left: -64px;
    background-color: #080000;
    border-radius: 12.5px;
    padding: 15px;
  }
  .chat-msg .chat-body strong {
    color: #0169da;
  }

  .chat-msg .buyer {
    text-align: right;
    float: right;
  }
  .chat-msg .buyer p {
    text-align: left;
  }
  .chat-msg .sender {
    text-align: left;
    float: left;
  }
  .chat-msg .left {
    float: left;
  }
  .chat-msg .right {
    float: right;
  }

  .clearfix {
    clear: both;
  }
  </style>

