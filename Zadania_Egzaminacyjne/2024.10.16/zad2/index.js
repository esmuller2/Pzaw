const express = require('express');

const app  = express();
app.use(express.urlencoded({extended: true}));
const  port = 3000;

const quiz  = [
    {
        question: "What is the capital of France?",
        choices: ["Paris", "London", "Berlin", "Madrid"],
        answer: "Paris"
    },
    {
        question: "What is the capital of Germany?",
        choices: ["Berlin", "Munich", "Hamburg", "Cologne"],
        answer: "Berlin"
    },
    {
        question: "What is the capital of Italy?",
        choices: ["Rome", "Milan", "Naples", "Turin"],
        answer: "Rome"
    }
]

let currentQuestionIndex = 0;
let score = 0;

let answersHistory = [];

