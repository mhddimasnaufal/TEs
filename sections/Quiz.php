<?php
/**
 * Quiz Section - Interactive Birthday Quiz
 */
?>
<section id="quiz" class="quiz-section">
    <div class="section-header">
        <h2 class="section-title">How Well Do You Know Naila?</h2>
        <div class="section-divider">
            <div class="divider-line"></div>
            <div class="divider-star">🎯</div>
            <div class="divider-line"></div>
        </div>
        <p class="section-subtitle">Take this fun quiz to test your knowledge!</p>
    </div>

    <div class="quiz-container">
        <div class="quiz-sidebar">
            <div class="quiz-progress">
                <div class="progress-circle">
                    <svg width="120" height="120" viewBox="0 0 120 120">
                        <circle class="progress-bg" cx="60" cy="60" r="54" stroke-width="12"></circle>
                        <circle class="progress-fill" cx="60" cy="60" r="54" stroke-width="12" 
                                stroke-dasharray="339.292" stroke-dashoffset="339.292"></circle>
                    </svg>
                    <div class="progress-text">
                        <span id="currentQuestion">1</span>
                        <span class="progress-total">/10</span>
                    </div>
                </div>
                <div class="progress-info">
                    <h4>Quiz Progress</h4>
                    <p>Question <span id="currentQuestionNum">1</span> of 10</p>
                </div>
            </div>
            
            <div class="quiz-stats">
                <div class="stat">
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h4 id="correctCount">0</h4>
                        <p>Correct</p>
                    </div>
                </div>
                
                <div class="stat">
                    <div class="stat-icon">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-content">
                        <h4 id="incorrectCount">0</h4>
                        <p>Incorrect</p>
                    </div>
                </div>
                
                <div class="stat">
                    <div class="stat-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="stat-content">
                        <h4 id="score">0</h4>
                        <p>Score</p>
                    </div>
                </div>
            </div>
            
            <div class="quiz-timer">
                <div class="timer-display">
                    <i class="fas fa-clock"></i>
                    <span id="quizTimer">02:00</span>
                </div>
                <div class="timer-bar">
                    <div class="timer-fill"></div>
                </div>
            </div>
            
            <div class="quiz-hint">
                <h4><i class="fas fa-lightbulb"></i> Need Help?</h4>
                <button id="hintBtn" class="hint-btn">
                    <i class="fas fa-question-circle"></i> Get Hint
                </button>
                <p class="hint-text" id="hintText">Hint will appear here</p>
            </div>
        </div>
        
        <div class="quiz-main">
            <div class="quiz-header">
                <div class="quiz-category">
                    <span class="category-badge" id="quizCategory">Personality</span>
                    <span class="difficulty" id="quizDifficulty">Easy</span>
                </div>
                <div class="quiz-points">
                    <i class="fas fa-coins"></i>
                    <span id="questionPoints">10</span> points
                </div>
            </div>
            
            <div class="quiz-question">
                <h2 id="questionText">What is Naila's favorite color?</h2>
                <div class="question-image" id="questionImage">
                    <!-- Image will be loaded here if needed -->
                </div>
            </div>
            
            <div class="quiz-options" id="quizOptions">
                <!-- Options will be loaded here -->
            </div>
            
            <div class="quiz-navigation">
                <button id="prevBtn" class="nav-btn prev" disabled>
                    <i class="fas fa-arrow-left"></i> Previous
                </button>
                
                <div class="navigation-center">
                    <button id="skipBtn" class="nav-btn skip">
                        <i class="fas fa-forward"></i> Skip
                    </button>
                    <button id="submitBtn" class="nav-btn submit">
                        Submit Answer <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
                
                <button id="nextBtn" class="nav-btn next">
                    Next <i class="fas fa-arrow-right"></i>
                </button>
            </div>
            
            <div class="quiz-feedback" id="quizFeedback">
                <!-- Feedback will be shown here -->
            </div>
        </div>
        
        <div class="quiz-leaderboard">
            <div class="leaderboard-header">
                <h3><i class="fas fa-trophy"></i> Top Scores</h3>
                <button id="refreshLeaderboard" class="refresh-btn">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
            
            <div class="leaderboard-list" id="leaderboardList">
                <!-- Leaderboard entries will be loaded here -->
                <div class="leaderboard-item">
                    <div class="rank">1</div>
                    <div class="player">
                        <div class="player-avatar">
                            <i class="fas fa-crown"></i>
                        </div>
                        <div class="player-info">
                            <h4>Sarah Johnson</h4>
                            <p>Yesterday</p>
                        </div>
                    </div>
                    <div class="score">95</div>
                </div>
                
                <div class="leaderboard-item">
                    <div class="rank">2</div>
                    <div class="player">
                        <div class="player-avatar">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="player-info">
                            <h4>Michael Chen</h4>
                            <p>Today</p>
                        </div>
                    </div>
                    <div class="score">90</div>
                </div>
                
                <div class="leaderboard-item">
                    <div class="rank">3</div>
                    <div class="player">
                        <div class="player-avatar">
                            <i class="fas fa-award"></i>
                        </div>
                        <div class="player-info">
                            <h4>Family Group</h4>
                            <p>2 days ago</p>
                        </div>
                    </div>
                    <div class="score">85</div>
                </div>
            </div>
            
            <div class="leaderboard-join">
                <h4>Your Score</h4>
                <div class="current-score" id="currentScoreDisplay">
                    <div class="score-value">0</div>
                    <div class="score-label">points</div>
                </div>
                <button id="saveScoreBtn" class="save-score-btn">
                    <i class="fas fa-save"></i> Save My Score
                </button>
            </div>
        </div>
    </div>
    
    <div class="quiz-categories">
        <h3><i class="fas fa-layer-group"></i> Quiz Categories</h3>
        <div class="categories-grid">
            <div class="category-card" data-category="personality">
                <div class="category-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="category-content">
                    <h4>Personality</h4>
                    <p>Know her likes, dislikes, and traits</p>
                    <div class="category-stats">
                        <span>5 questions</span>
                        <span class="difficulty-easy">Easy</span>
                    </div>
                </div>
            </div>
            
            <div class="category-card" data-category="memories">
                <div class="category-icon">
                    <i class="fas fa-memory"></i>
                </div>
                <div class="category-content">
                    <h4>Memories</h4>
                    <p>Special moments and experiences</p>
                    <div class="category-stats">
                        <span>10 questions</span>
                        <span class="difficulty-medium">Medium</span>
                    </div>
                </div>
            </div>
            
            <div class="category-card" data-category="interests">
                <div class="category-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="category-content">
                    <h4>Interests</h4>
                    <p>Hobbies, passions, and favorites</p>
                    <div class="category-stats">
                        <span>8 questions</span>
                        <span class="difficulty-easy">Easy</span>
                    </div>
                </div>
            </div>
            
            <div class="category-card" data-category="trivia">
                <div class="category-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <div class="category-content">
                    <h4>Fun Facts</h4>
                    <p>Interesting and surprising facts</p>
                    <div class="category-stats">
                        <span>12 questions</span>
                        <span class="difficulty-hard">Hard</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="quiz-instructions">
        <div class="instructions-content">
            <h3><i class="fas fa-graduation-cap"></i> How to Play</h3>
            <div class="instructions-grid">
                <div class="instruction">
                    <div class="instruction-number">1</div>
                    <div class="instruction-text">
                        <h4>Read Carefully</h4>
                        <p>Read each question thoroughly before answering</p>
                    </div>
                </div>
                
                <div class="instruction">
                    <div class="instruction-number">2</div>
                    <div class="instruction-text">
                        <h4>Use Hints</h4>
                        <p>Get hints if you're stuck on a question</p>
                    </div>
                </div>
                
                <div class="instruction">
                    <div class="instruction-number">3</div>
                    <div class="instruction-text">
                        <h4>Time Matters</h4>
                        <p>Faster answers earn bonus points</p>
                    </div>
                </div>
                
                <div class="instruction">
                    <div class="instruction-number">4</div>
                    <div class="instruction-text">
                        <h4>Save Your Score</h4>
                        <p>Enter your name to appear on the leaderboard</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="instructions-actions">
            <button id="startQuizBtn" class="start-quiz-btn">
                <i class="fas fa-play"></i> Start New Quiz
            </button>
            <button id="resetQuizBtn" class="reset-quiz-btn">
                <i class="fas fa-redo"></i> Reset Quiz
            </button>
        </div>
    </div>
</section>

<style>
.quiz-section {
    background: linear-gradient(135deg, #2d4059 0%, #1a2c42 100%);
    color: white;
    padding: 80px 20px;
    position: relative;
    overflow: hidden;
}

.quiz-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 80%, rgba(255, 195, 113, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(113, 195, 255, 0.1) 0%, transparent 50%);
    z-index: 0;
}

.quiz-section > * {
    position: relative;
    z-index: 1;
}

.quiz-container {
    max-width: 1400px;
    margin: 0 auto 60px;
    display: grid;
    grid-template-columns: 300px 1fr 300px;
    gap: 30px;
}

.quiz-sidebar, .quiz-leaderboard {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 25px;
    height: fit-content;
}

.quiz-progress {
    text-align: center;
    margin-bottom: 30px;
}

.progress-circle {
    position: relative;
    width: 120px;
    height: 120px;
    margin: 0 auto 20px;
}

.progress-circle svg {
    transform: rotate(-90deg);
}

.progress-bg {
    fill: none;
    stroke: rgba(255, 255, 255, 0.1);
}

.progress-fill {
    fill: none;
    stroke: #4cd964;
    stroke-linecap: round;
    transition: stroke-dashoffset 0.5s ease;
}

.progress-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.progress-text span {
    font-size: 32px;
    font-weight: bold;
    color: white;
}

.progress-total {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.7);
}

.progress-info h4 {
    margin: 0 0 5px 0;
    font-size: 18px;
    color: white;
}

.progress-info p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.quiz-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin-bottom: 30px;
}

.stat {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    border: 1px solid rgba(255, 255, 255, 0.05);
}

.stat-icon {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 10px;
    font-size: 18px;
}

.stat:nth-child(1) .stat-icon {
    background: rgba(76, 217, 100, 0.2);
    color: #4cd964;
}

.stat:nth-child(2) .stat-icon {
    background: rgba(255, 69, 58, 0.2);
    color: #ff453a;
}

.stat:nth-child(3) .stat-icon {
    background: rgba(255, 214, 10, 0.2);
    color: #ffd60a;
}

.stat-content h4 {
    margin: 0 0 5px 0;
    font-size: 22px;
    color: white;
}

.stat-content p {
    margin: 0;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.7);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.quiz-timer {
    margin-bottom: 30px;
}

.timer-display {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 15px;
}

.timer-display i {
    font-size: 20px;
    color: #ffd60a;
}

.timer-display span {
    font-size: 24px;
    font-weight: bold;
    font-family: monospace;
    color: white;
}

.timer-bar {
    height: 8px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 4px;
    overflow: hidden;
}

.timer-fill {
    height: 100%;
    background: linear-gradient(90deg, #ffd60a 0%, #ff9f0a 100%);
    width: 100%;
    border-radius: 4px;
    transition: width 1s linear;
}

.quiz-hint {
    text-align: center;
}

.quiz-hint h4 {
    margin: 0 0 15px 0;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.hint-btn {
    width: 100%;
    padding: 12px;
    background: rgba(255, 214, 10, 0.2);
    border: 1px solid rgba(255, 214, 10, 0.3);
    border-radius: 10px;
    color: #ffd60a;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-bottom: 15px;
    transition: all 0.3s ease;
}

.hint-btn:hover:not(:disabled) {
    background: rgba(255, 214, 10, 0.3);
    transform: translateY(-2px);
}

.hint-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.hint-text {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.5;
    min-height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 8px;
    border: 1px dashed rgba(255, 255, 255, 0.1);
}

.quiz-main {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    padding: 30px;
}

.quiz-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;
}

.quiz-category {
    display: flex;
    gap: 10px;
    align-items: center;
}

.category-badge {
    padding: 8px 16px;
    background: rgba(76, 217, 100, 0.2);
    color: #4cd964;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
}

.difficulty {
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
}

.quiz-points {
    display: flex;
    align-items: center;
    gap: 8px;
    background: rgba(255, 214, 10, 0.2);
    padding: 8px 16px;
    border-radius: 20px;
    color: #ffd60a;
    font-size: 16px;
    font-weight: 500;
}

.quiz-question {
    margin-bottom: 40px;
}

.quiz-question h2 {
    margin: 0 0 25px 0;
    font-size: 28px;
    line-height: 1.4;
    color: white;
    min-height: 80px;
}

.question-image {
    width: 100%;
    height: 200px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 15px;
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
}

.question-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.quiz-options {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 40px;
}

.option {
    padding: 25px;
    background: rgba(255, 255, 255, 0.03);
    border: 2px solid rgba(255, 255, 255, 0.1);
    border-radius: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 20px;
}

.option:hover {
    background: rgba(255, 255, 255, 0.05);
    transform: translateY(-3px);
}

.option.selected {
    background: rgba(76, 217, 100, 0.1);
    border-color: #4cd964;
}

.option.correct {
    background: rgba(76, 217, 100, 0.2);
    border-color: #4cd964;
    animation: pulseCorrect 0.5s ease;
}

.option.incorrect {
    background: rgba(255, 69, 58, 0.2);
    border-color: #ff453a;
    animation: shake 0.5s ease;
}

@keyframes pulseCorrect {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.02); }
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

.option-label {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 18px;
    color: white;
    flex-shrink: 0;
}

.option.selected .option-label {
    background: #4cd964;
    color: white;
}

.option-text {
    flex: 1;
    font-size: 18px;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.5;
}

.quiz-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.nav-btn {
    padding: 15px 30px;
    border: none;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: all 0.3s ease;
    min-width: 140px;
    justify-content: center;
}

.nav-btn.prev, .nav-btn.next {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.nav-btn.prev:hover:not(:disabled), .nav-btn.next:hover:not(:disabled) {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
}

.nav-btn.prev:disabled, .nav-btn.next:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
}

.nav-btn.skip {
    background: rgba(255, 214, 10, 0.2);
    color: #ffd60a;
    border: 1px solid rgba(255, 214, 10, 0.3);
}

.nav-btn.skip:hover:not(:disabled) {
    background: rgba(255, 214, 10, 0.3);
    transform: translateY(-2px);
}

.nav-btn.submit {
    background: linear-gradient(135deg, #4cd964 0%, #2ecc71 100%);
    color: white;
    border: none;
}

.nav-btn.submit:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(76, 217, 100, 0.4);
}

.nav-btn.submit:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
}

.navigation-center {
    display: flex;
    gap: 15px;
}

.quiz-feedback {
    margin-top: 30px;
    padding: 25px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 15px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    display: none;
}

.feedback-content {
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.feedback-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
}

.feedback-correct .feedback-icon {
    background: rgba(76, 217, 100, 0.2);
    color: #4cd964;
}

.feedback-incorrect .feedback-icon {
    background: rgba(255, 69, 58, 0.2);
    color: #ff453a;
}

.feedback-text h4 {
    margin: 0 0 10px 0;
    font-size: 20px;
    color: white;
}

.feedback-text p {
    margin: 0;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
}

.quiz-leaderboard .leaderboard-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.leaderboard-header h3 {
    margin: 0;
    font-size: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.refresh-btn {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    color: white;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.refresh-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: rotate(180deg);
}

.leaderboard-list {
    max-height: 400px;
    overflow-y: auto;
    margin-bottom: 25px;
}

.leaderboard-item {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 12px;
    margin-bottom: 10px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: transform 0.3s ease;
}

.leaderboard-item:hover {
    transform: translateX(5px);
    background: rgba(255, 255, 255, 0.05);
}

.leaderboard-item:nth-child(1) {
    background: rgba(255, 214, 10, 0.1);
    border-color: rgba(255, 214, 10, 0.2);
}

.leaderboard-item:nth-child(2) {
    background: rgba(200, 200, 200, 0.1);
    border-color: rgba(200, 200, 200, 0.2);
}

.leaderboard-item:nth-child(3) {
    background: rgba(205, 127, 50, 0.1);
    border-color: rgba(205, 127, 50, 0.2);
}

.rank {
    font-size: 20px;
    font-weight: bold;
    color: white;
    min-width: 30px;
}

.player {
    flex: 1;
    display: flex;
    gap: 15px;
    align-items: center;
}

.player-avatar {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #4cd964 0%, #2ecc71 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.player-info h4 {
    margin: 0 0 5px 0;
    font-size: 16px;
    color: white;
}

.player-info p {
    margin: 0;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.7);
}

.score {
    font-size: 20px;
    font-weight: bold;
    color: white;
    min-width: 50px;
    text-align: right;
}

.leaderboard-join {
    text-align: center;
    padding: 25px;
    background: rgba(255, 255, 255, 0.03);
    border-radius: 15px;
    border: 2px dashed rgba(255, 255, 255, 0.1);
}

.leaderboard-join h4 {
    margin: 0 0 15px 0;
    font-size: 18px;
    color: white;
}

.current-score {
    margin-bottom: 20px;
}

.score-value {
    font-size: 48px;
    font-weight: bold;
    color: #ffd60a;
    line-height: 1;
}

.score-label {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.save-score-btn {
    width: 100%;
    padding: 15px;
    background: linear-gradient(135deg, #4cd964 0%, #2ecc71 100%);
    border: none;
    border-radius: 12px;
    color: white;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.3s ease;
}

.save-score-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(76, 217, 100, 0.4);
}

.save-score-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
    transform: none !important;
}

.quiz-categories {
    max-width: 1200px;
    margin: 0 auto 60px;
}

.quiz-categories h3 {
    margin: 0 0 30px 0;
    font-size: 28px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.category-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    cursor: pointer;
}

.category-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.08);
}

.category-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #4cd964 0%, #2ecc71 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    font-size: 30px;
}

.category-content h4 {
    margin: 0 0 10px 0;
    font-size: 22px;
    color: white;
}

.category-content p {
    margin: 0 0 15px 0;
    font-size: 15px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.5;
}

.category-stats {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.difficulty-easy {
    color: #4cd964;
    font-weight: 500;
}

.difficulty-medium {
    color: #ffd60a;
    font-weight: 500;
}

.difficulty-hard {
    color: #ff453a;
    font-weight: 500;
}

.quiz-instructions {
    max-width: 1200px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 40px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.instructions-content h3 {
    margin: 0 0 30px 0;
    font-size: 28px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.instructions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

.instruction {
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.instruction-number {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #4cd964 0%, #2ecc71 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: bold;
    color: white;
    flex-shrink: 0;
}

.instruction-text h4 {
    margin: 0 0 8px 0;
    font-size: 18px;
    color: white;
}

.instruction-text p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.5;
}

.instructions-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
}

.start-quiz-btn, .reset-quiz-btn {
    padding: 18px 40px;
    border: none;
    border-radius: 15px;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
}

.start-quiz-btn {
    background: linear-gradient(135deg, #4cd964 0%, #2ecc71 100%);
    color: white;
}

.reset-quiz-btn {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.start-quiz-btn:hover, .reset-quiz-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

@media (max-width: 1200px) {
    .quiz-container {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    
    .quiz-sidebar, .quiz-leaderboard {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }
}

@media (max-width: 768px) {
    .quiz-section {
        padding: 60px 15px;
    }
    
    .quiz-options {
        grid-template-columns: 1fr;
    }
    
    .quiz-navigation {
        flex-direction: column;
    }
    
    .nav-btn {
        width: 100%;
    }
    
    .navigation-center {
        width: 100%;
        order: 3;
    }
    
    .categories-grid {
        grid-template-columns: 1fr;
    }
    
    .instructions-grid {
        grid-template-columns: 1fr;
    }
    
    .instructions-actions {
        flex-direction: column;
    }
    
    .start-quiz-btn, .reset-quiz-btn {
        width: 100%;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .quiz-question h2 {
        font-size: 22px;
    }
    
    .option {
        padding: 20px;
    }
    
    .quiz-stats {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
// Quiz data
const quizData = [
    {
        id: 1,
        category: "personality",
        difficulty: "easy",
        points: 10,
        question: "What is Naila's favorite color?",
        options: [
            { id: "A", text: "Blue", correct: false },
            { id: "B", text: "Purple", correct: true },
            { id: "C", text: "Pink", correct: false },
            { id: "D", text: "Green", correct: false }
        ],
        hint: "Think about the colors she often wears!",
        explanation: "Naila loves purple because it represents creativity and wisdom."
    },
    {
        id: 2,
        category: "interests",
        difficulty: "easy",
        points: 10,
        question: "What is Naila's favorite hobby?",
        options: [
            { id: "A", text: "Reading books", correct: true },
            { id: "B", text: "Playing sports", correct: false },
            { id: "C", text: "Painting", correct: false },
            { id: "D", text: "Cooking", correct: false }
        ],
        hint: "She enjoys quiet activities that stimulate the mind.",
        explanation: "Naila is an avid reader and can often be found with a good book."
    },
    {
        id: 3,
        category: "memories",
        difficulty: "medium",
        points: 15,
        question: "What was Naila's most memorable vacation?",
        options: [
            { id: "A", text: "Bali, Indonesia", correct: true },
            { id: "B", text: "Paris, France", correct: false },
            { id: "C", text: "Tokyo, Japan", correct: false },
            { id: "D", text: "New York, USA", correct: false }
        ],
        hint: "Think tropical paradise with beautiful beaches.",
        explanation: "Naila's trip to Bali was her favorite because of the beautiful temples and beaches."
    },
    {
        id: 4,
        category: "personality",
        difficulty: "medium",
        points: 15,
        question: "What quality best describes Naila?",
        options: [
            { id: "A", text: "Compassionate", correct: true },
            { id: "B", text: "Ambitious", correct: false },
            { id: "C", text: "Adventurous", correct: false },
            { id: "D", text: "Analytical", correct: false }
        ],
        hint: "She always cares about others' feelings.",
        explanation: "Naila is known for her compassionate nature and empathy towards others."
    },
    {
        id: 5,
        category: "trivia",
        difficulty: "hard",
        points: 20,
        question: "What is Naila's hidden talent?",
        options: [
            { id: "A", text: "Playing piano", correct: false },
            { id: "B", text: "Speaking multiple languages", correct: true },
            { id: "C", text: "Dancing ballet", correct: false },
            { id: "D", text: "Photography", correct: false }
        ],
        hint: "She can communicate with people from different cultures.",
        explanation: "Naila can speak three languages fluently: English, Indonesian, and basic Japanese."
    },
    {
        id: 6,
        category: "interests",
        difficulty: "easy",
        points: 10,
        question: "What is Naila's favorite season?",
        options: [
            { id: "A", text: "Spring", correct: true },
            { id: "B", text: "Summer", correct: false },
            { id: "C", text: "Autumn", correct: false },
            { id: "D", text: "Winter", correct: false }
        ],
        hint: "She loves when flowers bloom and everything feels fresh.",
        explanation: "Spring is Naila's favorite because she loves seeing flowers bloom and the pleasant weather."
    },
    {
        id: 7,
        category: "memories",
        difficulty: "medium",
        points: 15,
        question: "What was Naila's favorite childhood game?",
        options: [
            { id: "A", text: "Hide and Seek", correct: false },
            { id: "B", text: "Jump rope", correct: true },
            { id: "C", text: "Board games", correct: false },
            { id: "D", text: "Video games", correct: false }
        ],
        hint: "Think of active outdoor games she played with friends.",
        explanation: "Naila loved jump rope and could do many different tricks and routines."
    },
    {
        id: 8,
        category: "personality",
        difficulty: "medium",
        points: 15,
        question: "How does Naila prefer to spend her weekends?",
        options: [
            { id: "A", text: "Socializing with friends", correct: false },
            { id: "B", text: "Family time at home", correct: true },
            { id: "C", text: "Exploring new places", correct: false },
            { id: "D", text: "Catching up on work", correct: false }
        ],
        hint: "She values quality time with loved ones.",
        explanation: "Naila cherishes weekends spent with family, enjoying simple moments together."
    },
    {
        id: 9,
        category: "trivia",
        difficulty: "hard",
        points: 20,
        question: "What is Naila's favorite type of music?",
        options: [
            { id: "A", text: "Pop", correct: false },
            { id: "B", text: "Classical", correct: false },
            { id: "C", text: "Jazz", correct: true },
            { id: "D", text: "Rock", correct: false }
        ],
        hint: "Think sophisticated and relaxing music.",
        explanation: "Naila enjoys jazz music for its complexity and emotional depth."
    },
    {
        id: 10,
        category: "interests",
        difficulty: "easy",
        points: 10,
        question: "What is Naila's favorite dessert?",
        options: [
            { id: "A", text: "Chocolate cake", correct: false },
            { id: "B", text: "Ice cream", correct: false },
            { id: "C", text: "Cheesecake", correct: true },
            { id: "D", text: "Fruit tart", correct: false }
        ],
        hint: "Think creamy and delicious!",
        explanation: "Naila absolutely loves cheesecake, especially the New York style."
    }
];

// Quiz state
let currentQuestionIndex = 0;
let selectedOption = null;
let score = 0;
let correctAnswers = 0;
let incorrectAnswers = 0;
let quizStarted = false;
let quizTimer = 120; // 2 minutes in seconds
let timerInterval = null;
let usedHints = 0;

// DOM Elements
const questionText = document.getElementById('questionText');
const quizOptions = document.getElementById('quizOptions');
const currentQuestion = document.getElementById('currentQuestion');
const currentQuestionNum = document.getElementById('currentQuestionNum');
const correctCount = document.getElementById('correctCount');
const incorrectCount = document.getElementById('incorrectCount');
const scoreDisplay = document.getElementById('score');
const quizTimerDisplay = document.getElementById('quizTimer');
const timerFill = document.querySelector('.timer-fill');
const hintBtn = document.getElementById('hintBtn');
const hintText = document.getElementById('hintText');
const quizCategory = document.getElementById('quizCategory');
const quizDifficulty = document.getElementById('quizDifficulty');
const questionPoints = document.getElementById('questionPoints');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const skipBtn = document.getElementById('skipBtn');
const submitBtn = document.getElementById('submitBtn');
const quizFeedback = document.getElementById('quizFeedback');
const progressFill = document.querySelector('.progress-fill');
const currentScoreDisplay = document.getElementById('currentScoreDisplay');
const saveScoreBtn = document.getElementById('saveScoreBtn');
const startQuizBtn = document.getElementById('startQuizBtn');
const resetQuizBtn = document.getElementById('resetQuizBtn');

// Initialize quiz
function initQuiz() {
    currentQuestionIndex = 0;
    selectedOption = null;
    score = 0;
    correctAnswers = 0;
    incorrectAnswers = 0;
    quizStarted = false;
    quizTimer = 120;
    usedHints = 0;
    
    // Reset displays
    updateStats();
    updateProgress();
    updateTimerDisplay();
    
    // Reset UI
    quizFeedback.style.display = 'none';
    submitBtn.disabled = true;
    prevBtn.disabled = true;
    hintBtn.disabled = false;
    hintText.textContent = 'Hint will appear here';
    
    // Load first question
    loadQuestion(currentQuestionIndex);
    
    // Start timer if not already started
    if (!timerInterval) {
        startTimer();
    }
}

// Load question
function loadQuestion(index) {
    if (index < 0 || index >= quizData.length) return;
    
    const question = quizData[index];
    
    // Update question display
    questionText.textContent = question.question;
    currentQuestion.textContent = index + 1;
    currentQuestionNum.textContent = index + 1;
    quizCategory.textContent = question.category.charAt(0).toUpperCase() + question.category.slice(1);
    quizDifficulty.textContent = question.difficulty.charAt(0).toUpperCase() + question.difficulty.slice(1);
    questionPoints.textContent = question.points;
    
    // Clear previous options
    quizOptions.innerHTML = '';
    
    // Create new options
    question.options.forEach(option => {
        const optionElement = document.createElement('div');
        optionElement.className = 'option';
        optionElement.dataset.id = option.id;
        
        optionElement.innerHTML = `
            <div class="option-label">${option.id}</div>
            <div class="option-text">${option.text}</div>
        `;
        
        optionElement.addEventListener('click', () => selectOption(optionElement, option));
        quizOptions.appendChild(optionElement);
    });
    
    // Update navigation buttons
    prevBtn.disabled = index === 0;
    nextBtn.disabled = index === quizData.length - 1;
    
    // Reset selection
    selectedOption = null;
    submitBtn.disabled = true;
    
    // Update hint
    hintText.textContent = question.hint;
    
    // Update progress
    updateProgress();
}

// Select option
function selectOption(optionElement, option) {
    // Remove selection from all options
    document.querySelectorAll('.option').forEach(opt => {
        opt.classList.remove('selected');
    });
    
    // Add selection to clicked option
    optionElement.classList.add('selected');
    selectedOption = option;
    submitBtn.disabled = false;
}

// Submit answer
function submitAnswer() {
    if (!selectedOption) return;
    
    const question = quizData[currentQuestionIndex];
    const isCorrect = selectedOption.correct;
    
    // Disable all options
    document.querySelectorAll('.option').forEach(opt => {
        opt.style.pointerEvents = 'none';
    });
    
    // Show correct/incorrect styling
    document.querySelectorAll('.option').forEach(opt => {
        const optionId = opt.dataset.id;
        const correctOption = question.options.find(o => o.correct);
        
        if (optionId === correctOption.id) {
            opt.classList.add('correct');
        } else if (opt.classList.contains('selected') && !isCorrect) {
            opt.classList.add('incorrect');
        }
    });
    
    // Update stats
    if (isCorrect) {
        correctAnswers++;
        score += question.points;
        
        // Bonus for fast answers
        const timeBonus = Math.max(0, 120 - quizTimer);
        if (timeBonus < 30) {
            score += 5; // Bonus for answering quickly
        }
    } else {
        incorrectAnswers++;
    }
    
    updateStats();
    
    // Show feedback
    showFeedback(isCorrect, question.explanation);
    
    // Update navigation
    submitBtn.disabled = true;
    nextBtn.disabled = false;
}

// Show feedback
function showFeedback(isCorrect, explanation) {
    quizFeedback.style.display = 'block';
    quizFeedback.className = 'quiz-feedback';
    quizFeedback.classList.add(isCorrect ? 'feedback-correct' : 'feedback-incorrect');
    
    const icon = isCorrect ? 'fas fa-check-circle' : 'fas fa-times-circle';
    const title = isCorrect ? 'Correct!' : 'Incorrect!';
    
    quizFeedback.innerHTML = `
        <div class="feedback-content">
            <div class="feedback-icon">
                <i class="${icon}"></i>
            </div>
            <div class="feedback-text">
                <h4>${title}</h4>
                <p>${explanation}</p>
            </div>
        </div>
    `;
}

// Update stats
function updateStats() {
    correctCount.textContent = correctAnswers;
    incorrectCount.textContent = incorrectAnswers;
    scoreDisplay.textContent = score;
    
    // Update current score display
    const scoreValue = currentScoreDisplay.querySelector('.score-value');
    if (scoreValue) {
        scoreValue.textContent = score;
    }
}

// Update progress
function updateProgress() {
    const progress = ((currentQuestionIndex) / quizData.length) * 339.292;
    progressFill.style.strokeDashoffset = 339.292 - progress;
}

// Update timer display
function updateTimerDisplay() {
    const minutes = Math.floor(quizTimer / 60);
    const seconds = quizTimer % 60;
    quizTimerDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    
    // Update timer bar
    const percentage = (quizTimer / 120) * 100;
    timerFill.style.width = `${percentage}%`;
    
    // Change color when time is running out
    if (quizTimer <= 30) {
        timerFill.style.background = 'linear-gradient(90deg, #ff453a 0%, #ff375f 100%)';
    } else if (quizTimer <= 60) {
        timerFill.style.background = 'linear-gradient(90deg, #ffd60a 0%, #ff9f0a 100%)';
    }
}

// Start timer
function startTimer() {
    if (timerInterval) clearInterval(timerInterval);
    
    timerInterval = setInterval(() => {
        quizTimer--;
        updateTimerDisplay();
        
        if (quizTimer <= 0) {
            clearInterval(timerInterval);
            endQuiz();
        }
    }, 1000);
}

// End quiz
function endQuiz() {
    // Disable all buttons
    submitBtn.disabled = true;
    prevBtn.disabled = true;
    nextBtn.disabled = true;
    skipBtn.disabled = true;
    hintBtn.disabled = true;
    
    // Show final message
    quizFeedback.style.display = 'block';
    quizFeedback.innerHTML = `
        <div class="feedback-content">
            <div class="feedback-icon">
                <i class="fas fa-flag-checkered"></i>
            </div>
            <div class="feedback-text">
                <h4>Time's Up!</h4>
                <p>Quiz completed! You scored ${score} points with ${correctAnswers} correct answers.</p>
                <button onclick="initQuiz()" style="margin-top: 15px; padding: 10px 20px; background: #4cd964; border: none; border-radius: 8px; color: white; cursor: pointer;">
                    Try Again
                </button>
            </div>
        </div>
    `;
    
    // Enable save score button
    saveScoreBtn.disabled = false;
}

// Next question
function nextQuestion() {
    if (currentQuestionIndex < quizData.length - 1) {
        currentQuestionIndex++;
        loadQuestion(currentQuestionIndex);
        quizFeedback.style.display = 'none';
    } else {
        // End of quiz
        endQuiz();
    }
}

// Previous question
function prevQuestion() {
    if (currentQuestionIndex > 0) {
        currentQuestionIndex--;
        loadQuestion(currentQuestionIndex);
        quizFeedback.style.display = 'none';
    }
}

// Skip question
function skipQuestion() {
    // Move to next question without penalty
    nextQuestion();
}

// Use hint
function useHint() {
    const question = quizData[currentQuestionIndex];
    hintText.textContent = question.hint;
    usedHints++;
    
    // Disable hint button after use
    hintBtn.disabled = true;
    
    // Small penalty for using hint
    if (score > 0) {
        score -= 2;
        updateStats();
    }
}

// Save score
function saveScore() {
    const playerName = prompt('Enter your name for the leaderboard:', 'Player');
    
    if (playerName) {
        // In a real application, this would save to a server
        // For demo, we'll just show a message
        alert(`Score saved for ${playerName}! (In a real app, this would update the leaderboard)`);
        
        // Add to leaderboard (temporary)
        const leaderboardList = document.getElementById('leaderboardList');
        const newEntry = document.createElement('div');
        newEntry.className = 'leaderboard-item';
        newEntry.innerHTML = `
            <div class="rank">?</div>
            <div class="player">
                <div class="player-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="player-info">
                    <h4>${playerName}</h4>
                    <p>Just now</p>
                </div>
            </div>
            <div class="score">${score}</div>
        `;
        leaderboardList.insertBefore(newEntry, leaderboardList.firstChild);
        
        // Disable save button
        saveScoreBtn.disabled = true;
    }
}

// Event Listeners
document.addEventListener('DOMContentLoaded', function() {
    // Initialize quiz
    initQuiz();
    
    // Button event listeners
    nextBtn.addEventListener('click', nextQuestion);
    prevBtn.addEventListener('click', prevQuestion);
    skipBtn.addEventListener('click', skipQuestion);
    submitBtn.addEventListener('click', submitAnswer);
    hintBtn.addEventListener('click', useHint);
    saveScoreBtn.addEventListener('click', saveScore);
    startQuizBtn.addEventListener('click', initQuiz);
    resetQuizBtn.addEventListener('click', initQuiz);
    
    // Refresh leaderboard
    const refreshLeaderboard = document.getElementById('refreshLeaderboard');
    if (refreshLeaderboard) {
        refreshLeaderboard.addEventListener('click', function() {
            this.classList.add('refreshing');
            setTimeout(() => {
                this.classList.remove('refreshing');
                alert('Leaderboard refreshed! (New scores would load from server)');
            }, 1000);
        });
    }
    
    // Category cards
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const category = this.dataset.category;
            // Filter questions by category
            const filteredQuestions = quizData.filter(q => q.category === category);
            
            if (filteredQuestions.length > 0) {
                // Start quiz with filtered questions
                // For demo, we'll just show an alert
                alert(`Starting ${category} quiz with ${filteredQuestions.length} questions!`);
                initQuiz();
            }
        });
    });
    
    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (!quizStarted) return;
        
        switch(e.key) {
            case '1':
            case '2':
            case '3':
            case '4':
                // Select option
                const optionIndex = parseInt(e.key) - 1;
                const options = document.querySelectorAll('.option');
                if (options[optionIndex]) {
                    options[optionIndex].click();
                }
                break;
            case 'Enter':
                // Submit answer
                if (!submitBtn.disabled) {
                    submitBtn.click();
                }
                break;
            case 'ArrowRight':
                // Next question
                if (!nextBtn.disabled) {
                    nextBtn.click();
                }
                break;
            case 'ArrowLeft':
                // Previous question
                if (!prevBtn.disabled) {
                    prevBtn.click();
                }
                break;
            case ' ':
                // Skip question
                e.preventDefault();
                if (!skipBtn.disabled) {
                    skipBtn.click();
                }
                break;
            case 'h':
            case 'H':
                // Hint
                if (!hintBtn.disabled) {
                    hintBtn.click();
                }
                break;
        }
    });
    
    // Start quiz on first interaction
    document.addEventListener('click', function startQuizOnInteraction() {
        quizStarted = true;
        document.removeEventListener('click', startQuizOnInteraction);
    }, { once: true });
});
</script>