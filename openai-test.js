const axios = require('axios');
const readlineSync = require('readline-sync');
const fs = require('fs');
require('dotenv').config();

// Replace with your OpenAI API key
const API_KEY = process.env.OPENAI_APi_KEY;

const apiEndpoint = 'https://api.openai.com/v1/chat/completions';

const headers = {
    'Content-Type': 'application/json',
    'Authorization': `Bearer ${API_KEY}`
};

let conversationHistory = [];

function saveConversation() {
    fs.writeFileSync('conversation_history.json', JSON.stringify(conversationHistory, null, 2));
}

function loadConversation() {
    if (fs.existsSync('conversation_history.json')) {
        conversationHistory = JSON.parse(fs.readFileSync('conversation_history.json'));
    }
}

async function getChatGptResponse(messages) {
    try {
        const response = await axios.post(apiEndpoint, {
            model: 'gpt-3.5-turbo', // or another model
            messages: messages,
            max_tokens: 150,
            temperature: 0.7,
        }, { headers: headers });

        return response.data.choices[0].message.content;
    } catch (error) {
        console.error('Error:', error.response ? error.response.data : error.message);
    }
}

(async () => {
    loadConversation();

    console.log('Start chatting with ChatGPT! Type "exit" to end the conversation.');

    while (true) {
        const userInput = readlineSync.question('You: ');

        if (userInput.toLowerCase() === 'exit') {
            saveConversation();
            break;
        }

        conversationHistory.push({ role: 'user', content: userInput });

        const assistantResponse = await getChatGptResponse(conversationHistory);

        console.log('ChatGPT:', assistantResponse);

        conversationHistory.push({ role: 'assistant', content: assistantResponse });
    }
})();
