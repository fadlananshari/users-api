const request = require('supertest');
const API_URL = 'http://127.0.0.1:8000/api';

describe('User API', () => {
    it('should return a list of users', async () => {
        const response = await request(API_URL).get('/users');

        expect(response.status).toBe(200);
        expect(Array.isArray(response.body.data)).toBe(true);
    });

    it('should create a new user', async () => {
        const newUser = { 
            name: 'John Doe', 
            email: `john${Date.now()}@example.com`,
            age: 25
        };

        const response = await request(API_URL)
            .post('/users')
            .send(newUser)
            .set('Accept', 'application/json');

        expect(response.status).toBe(201);
        expect(response.body.data.name).toBe(newUser.name);
        expect(response.body.data.email).toBe(newUser.email);
        expect(response.body.data.age).toBe(newUser.age);
    });
});
