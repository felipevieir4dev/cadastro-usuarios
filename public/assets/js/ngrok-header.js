// Intercepta todas as requisições fetch para adicionar o header ngrok-skip-browser-warning
const originalFetch = window.fetch;
window.fetch = function(url, options = {}) {
    // Se não houver headers, cria um objeto vazio
    if (!options.headers) {
        options.headers = {};
    }
    
    // Se headers for um objeto Headers, converte para objeto plain
    if (options.headers instanceof Headers) {
        const plainHeaders = {};
        options.headers.forEach((value, key) => {
            plainHeaders[key] = value;
        });
        options.headers = plainHeaders;
    }
    
    // Adiciona o header ngrok-skip-browser-warning
    options.headers['ngrok-skip-browser-warning'] = 'true';
    
    // Chama o fetch original com os headers modificados
    return originalFetch(url, options);
};
