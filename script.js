document.getElementById('chatbot-toggle-btn').addEventListener('click', toggleChatbot);
document.getElementById('close-btn').addEventListener('click', toggleChatbot);
document.getElementById('send-btn').addEventListener('click', sendMessage);
document.getElementById('user-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

const apiEndpoint = 'https://api.openai.com/v1/chat/completions';
const apiKey = 'YOUR_OPENAI_API_KEY';  // Reemplaza con tu clave de API

let conversationHistory = [];

function toggleChatbot() {
    const chatbotPopup = document.getElementById('chatbot-popup');
    chatbotPopup.style.display = chatbotPopup.style.display === 'none' ? 'block' : 'none';
}

async function sendMessage() {
    const userInput = document.getElementById('user-input').value.trim();
    if (userInput !== '') {
        appendMessage('user', userInput);
        conversationHistory.push({ role: 'user', content: userInput });

        const assistantResponse = await getChatGptResponse(conversationHistory);
        
        if (assistantResponse) {
            appendMessage('bot', assistantResponse);
            conversationHistory.push({ role: 'assistant', content: assistantResponse });
        }
        
        document.getElementById('user-input').value = '';
        
        // Guardar el historial en localStorage
        localStorage.setItem('chat_history', JSON.stringify(conversationHistory));
    }
}

async function getChatGptResponse(messages) {
    try {
        const response = await fetch(apiEndpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${apiKey}`
            },
            body: JSON.stringify({
                model: 'gpt-3.5-turbo',  // o el modelo que estés utilizando
                messages: messages,
                max_tokens: 150,
                temperature: 0.7,
            })
        });

        const data = await response.json();
        return data.choices[0].message.content;
    } catch (error) {
        console.error('Error:', error.message);
        return 'There was an error processing your request.';
    }
}

function appendMessage(sender, message) {
    const chatBox = document.getElementById('chat-box');
    const messageElement = document.createElement('div');
    messageElement.classList.add(sender === 'user' ? 'user-message' : 'bot-message');
    messageElement.innerHTML = message;
    chatBox.appendChild(messageElement);
    chatBox.scrollTop = chatBox.scrollHeight;
}

// Cargar el historial de la conversación desde localStorage al iniciar
document.addEventListener('DOMContentLoaded', () => {
    const storedHistory = localStorage.getItem('chat_history');
    if (storedHistory) {
        conversationHistory = JSON.parse(storedHistory);
        conversationHistory.forEach(message => {
            appendMessage(message.role === 'user' ? 'user' : 'bot', message.content);
        });
    }
});
