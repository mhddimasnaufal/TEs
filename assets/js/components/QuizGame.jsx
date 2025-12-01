import React, { useState, useEffect, useRef } from 'react';
import './QuizGame.css';

const QuizGame = () => {
  // Quiz questions data
  const quizQuestions = [
    {
      id: 1,
      category: "Personality",
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
      explanation: "Naila loves purple because it represents creativity and wisdom.",
      image: null
    },
    {
      id: 2,
      category: "Interests",
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
      explanation: "Naila is an avid reader and can often be found with a good book.",
      image: null
    },
    {
      id: 3,
      category: "Memories",
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
      explanation: "Naila's trip to Bali was her favorite because of the beautiful temples and beaches.",
      image: null
    },
    {
      id: 4,
      category: "Personality",
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
      explanation: "Naila is known for her compassionate nature and empathy towards others.",
      image: null
    },
    {
      id: 5,
      category: "Trivia",
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
      explanation: "Naila can speak three languages fluently: English, Indonesian, and basic Japanese.",
      image: null
    },
    {
      id: 6,
      category: "Interests",
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
      explanation: "Spring is Naila's favorite because she loves seeing flowers bloom and the pleasant weather.",
      image: null
    },
    {
      id: 7,
      category: "Memories",
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
      explanation: "Naila loved jump rope and could do many different tricks and routines.",
      image: null
    },
    {
      id: 8,
      category: "Personality",
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
      explanation: "Naila cherishes weekends spent with family, enjoying simple moments together.",
      image: null
    },
    {
      id: 9,
      category: "Trivia",
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
      explanation: "Naila enjoys jazz music for its complexity and emotional depth.",
      image: null
    },
    {
      id: 10,
      category: "Interests",
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
      explanation: "Naila absolutely loves cheesecake, especially the New York style.",
      image: null
    }
  ];

  // Quiz state
  const [currentQuestionIndex, setCurrentQuestionIndex] = useState(0);
  const [selectedOption, setSelectedOption] = useState(null);
  const [score, setScore] = useState(0);
  const [correctAnswers, setCorrectAnswers] = useState(0);
  const [incorrectAnswers, setIncorrectAnswers] = useState(0);
  const [quizStarted, setQuizStarted] = useState(false);
  const [quizCompleted, setQuizCompleted] = useState(false);
  const [timeLeft, setTimeLeft] = useState(120); // 2 minutes in seconds
  const [showHint, setShowHint] = useState(false);
  const [showFeedback, setShowFeedback] = useState(false);
  const [feedbackMessage, setFeedbackMessage] = useState('');
  const [isCorrect, setIsCorrect] = useState(false);
  const [playerName, setPlayerName] = useState('');
  const [leaderboard, setLeaderboard] = useState([
    { id: 1, name: "Sarah Johnson", score: 95, date: "Yesterday" },
    { id: 2, name: "Michael Chen", score: 90, date: "Today" },
    { id: 3, name: "Family Group", score: 85, date: "2 days ago" },
    { id: 4, name: "Best Friend", score: 80, date: "3 days ago" },
    { id: 5, name: "Work Colleagues", score: 75, date: "1 week ago" }
  ]);
  const [showLeaderboardForm, setShowLeaderboardForm] = useState(false);

  const timerRef = useRef(null);
  const currentQuestion = quizQuestions[currentQuestionIndex];

  // Timer effect
  useEffect(() => {
    if (quizStarted && !quizCompleted && timeLeft > 0) {
      timerRef.current = setInterval(() => {
        setTimeLeft(prev => {
          if (prev <= 1) {
            endQuiz();
            return 0;
          }
          return prev - 1;
        });
      }, 1000);
    }

    return () => {
      if (timerRef.current) {
        clearInterval(timerRef.current);
      }
    };
  }, [quizStarted, quizCompleted, timeLeft]);

  // Format time display
  const formatTime = (seconds) => {
    const mins = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
  };

  // Calculate progress percentage
  const progressPercentage = ((currentQuestionIndex) / quizQuestions.length) * 100;

  // Handle option selection
  const handleOptionSelect = (option) => {
    if (showFeedback) return; // Prevent selection after answer submitted
    setSelectedOption(option);
  };

  // Submit answer
  const submitAnswer = () => {
    if (!selectedOption || showFeedback) return;

    const isAnswerCorrect = selectedOption.correct;
    
    // Update score
    if (isAnswerCorrect) {
      setScore(prev => prev + currentQuestion.points);
      setCorrectAnswers(prev => prev + 1);
      setFeedbackMessage(currentQuestion.explanation);
      setIsCorrect(true);
    } else {
      setIncorrectAnswers(prev => prev + 1);
      const correctAnswer = currentQuestion.options.find(opt => opt.correct);
      setFeedbackMessage(`Incorrect. The correct answer was: ${correctAnswer.text}. ${currentQuestion.explanation}`);
      setIsCorrect(false);
    }

    setShowFeedback(true);
    setShowHint(false);
  };

  // Move to next question
  const nextQuestion = () => {
    if (currentQuestionIndex < quizQuestions.length - 1) {
      setCurrentQuestionIndex(prev => prev + 1);
      setSelectedOption(null);
      setShowFeedback(false);
      setShowHint(false);
    } else {
      endQuiz();
    }
  };

  // Move to previous question
  const prevQuestion = () => {
    if (currentQuestionIndex > 0) {
      setCurrentQuestionIndex(prev => prev - 1);
      setSelectedOption(null);
      setShowFeedback(false);
      setShowHint(false);
    }
  };

  // Skip question
  const skipQuestion = () => {
    nextQuestion();
  };

  // Use hint
  const useHint = () => {
    setShowHint(true);
  };

  // Start quiz
  const startQuiz = () => {
    setQuizStarted(true);
    setQuizCompleted(false);
    setCurrentQuestionIndex(0);
    setScore(0);
    setCorrectAnswers(0);
    setIncorrectAnswers(0);
    setTimeLeft(120);
    setSelectedOption(null);
    setShowFeedback(false);
    setShowHint(false);
  };

  // End quiz
  const endQuiz = () => {
    setQuizCompleted(true);
    setQuizStarted(false);
    if (timerRef.current) {
      clearInterval(timerRef.current);
    }
  };

  // Restart quiz
  const restartQuiz = () => {
    startQuiz();
  };

  // Save score to leaderboard
  const saveScore = () => {
    if (!playerName.trim()) {
      alert('Please enter your name!');
      return;
    }

    const newEntry = {
      id: leaderboard.length + 1,
      name: playerName,
      score: score,
      date: 'Just now'
    };

    // Add to leaderboard and sort by score
    const updatedLeaderboard = [...leaderboard, newEntry]
      .sort((a, b) => b.score - a.score)
      .slice(0, 10); // Keep only top 10

    setLeaderboard(updatedLeaderboard);
    setShowLeaderboardForm(false);
    setPlayerName('');
    alert('Score saved to leaderboard!');
  };

  // Calculate accuracy
  const accuracy = correctAnswers + incorrectAnswers > 0 
    ? Math.round((correctAnswers / (correctAnswers + incorrectAnswers)) * 100) 
    : 0;

  // Calculate average time per question
  const averageTime = quizQuestions.length > 0 
    ? Math.round((120 - timeLeft) / (currentQuestionIndex + 1)) 
    : 0;

  return (
    <div className="quiz-game-container">
      <header className="quiz-header">
        <h1>🎯 How Well Do You Know Naila?</h1>
        <p>Test your knowledge with this fun birthday quiz!</p>
      </header>

      {!quizStarted && !quizCompleted ? (
        <div className="quiz-start-screen">
          <div className="start-screen-content">
            <div className="welcome-card">
              <div className="welcome-icon">🎂</div>
              <h2>Birthday Quiz Challenge</h2>
              <p>Answer 10 questions about Naila's personality, interests, and memories.</p>
              
              <div className="quiz-stats-preview">
                <div className="stat-preview">
                  <div className="stat-value">10</div>
                  <div className="stat-label">Questions</div>
                </div>
                <div className="stat-preview">
                  <div className="stat-value">120</div>
                  <div className="stat-label">Seconds</div>
                </div>
                <div className="stat-preview">
                  <div className="stat-value">3</div>
                  <div className="stat-label">Difficulties</div>
                </div>
              </div>

              <div className="instructions">
                <h3>📝 How to Play</h3>
                <ul>
                  <li>Read each question carefully</li>
                  <li>Select the correct answer from 4 options</li>
                  <li>Use hints if you get stuck</li>
                  <li>Complete within the time limit</li>
                  <li>Save your score to the leaderboard</li>
                </ul>
              </div>

              <button className="start-quiz-btn" onClick={startQuiz}>
                🚀 Start Quiz
              </button>
            </div>

            <div className="leaderboard-preview">
              <h3>🏆 Top Scores</h3>
              <div className="leaderboard-list">
                {leaderboard.slice(0, 5).map((entry, index) => (
                  <div key={entry.id} className="leaderboard-entry">
                    <div className="entry-rank">{index + 1}</div>
                    <div className="entry-name">{entry.name}</div>
                    <div className="entry-score">{entry.score}</div>
                  </div>
                ))}
              </div>
              <p className="leaderboard-note">Can you beat the high score?</p>
            </div>
          </div>
        </div>
      ) : quizCompleted ? (
        <div className="quiz-results-screen">
          <div className="results-content">
            <div className="results-header">
              <div className="results-icon">🏆</div>
              <h2>Quiz Completed!</h2>
              <p>Here's how you did:</p>
            </div>

            <div className="results-stats">
              <div className="result-stat">
                <div className="stat-icon">⭐</div>
                <div className="stat-content">
                  <div className="stat-value">{score}</div>
                  <div className="stat-label">Total Score</div>
                </div>
              </div>

              <div className="result-stat">
                <div className="stat-icon">✅</div>
                <div className="stat-content">
                  <div className="stat-value">{correctAnswers}/10</div>
                  <div className="stat-label">Correct Answers</div>
                </div>
              </div>

              <div className="result-stat">
                <div className="stat-icon">🎯</div>
                <div className="stat-content">
                  <div className="stat-value">{accuracy}%</div>
                  <div className="stat-label">Accuracy</div>
                </div>
              </div>

              <div className="result-stat">
                <div className="stat-icon">⏱️</div>
                <div className="stat-content">
                  <div className="stat-value">{formatTime(120 - timeLeft)}</div>
                  <div className="stat-label">Time Taken</div>
                </div>
              </div>
            </div>

            <div className="performance-chart">
              <h3>📊 Performance Breakdown</h3>
              <div className="chart-bars">
                <div className="chart-bar correct" style={{ width: `${(correctAnswers / 10) * 100}%` }}>
                  <span>Correct: {correctAnswers}</span>
                </div>
                <div className="chart-bar incorrect" style={{ width: `${(incorrectAnswers / 10) * 100}%` }}>
                  <span>Incorrect: {incorrectAnswers}</span>
                </div>
              </div>
            </div>

            {!showLeaderboardForm ? (
              <div className="results-actions">
                <button className="action-btn primary" onClick={() => setShowLeaderboardForm(true)}>
                  💾 Save to Leaderboard
                </button>
                <button className="action-btn secondary" onClick={restartQuiz}>
                  🔄 Play Again
                </button>
                <button className="action-btn" onClick={() => setQuizCompleted(false)}>
                  🏆 View Leaderboard
                </button>
              </div>
            ) : (
              <div className="leaderboard-form">
                <h3>Save Your Score</h3>
                <div className="form-group">
                  <input
                    type="text"
                    placeholder="Enter your name"
                    value={playerName}
                    onChange={(e) => setPlayerName(e.target.value)}
                    className="name-input"
                  />
                  <div className="score-preview">
                    Your score: <span className="score-value">{score}</span> points
                  </div>
                </div>
                <div className="form-actions">
                  <button className="save-btn" onClick={saveScore}>
                    💾 Save Score
                  </button>
                  <button className="cancel-btn" onClick={() => setShowLeaderboardForm(false)}>
                    Cancel
                  </button>
                </div>
              </div>
            )}
          </div>
        </div>
      ) : (
        <div className="quiz-game-main">
          <div className="quiz-sidebar">
            <div className="progress-section">
              <div className="progress-circle">
                <svg width="100" height="100" viewBox="0 0 100 100">
                  <circle
                    className="progress-bg"
                    cx="50"
                    cy="50"
                    r="45"
                    strokeWidth="8"
                  />
                  <circle
                    className="progress-fill"
                    cx="50"
                    cy="50"
                    r="45"
                    strokeWidth="8"
                    strokeDasharray="283"
                    strokeDashoffset={283 - (progressPercentage / 100) * 283}
                  />
                </svg>
                <div className="progress-text">
                  <span className="current">{currentQuestionIndex + 1}</span>
                  <span className="total">/10</span>
                </div>
              </div>
              <div className="progress-info">
                <h4>Progress</h4>
                <p>Question {currentQuestionIndex + 1} of 10</p>
              </div>
            </div>

            <div className="stats-section">
              <div className="stat-item">
                <div className="stat-icon correct">✅</div>
                <div className="stat-content">
                  <div className="stat-value">{correctAnswers}</div>
                  <div className="stat-label">Correct</div>
                </div>
              </div>
              <div className="stat-item">
                <div className="stat-icon incorrect">❌</div>
                <div className="stat-content">
                  <div className="stat-value">{incorrectAnswers}</div>
                  <div className="stat-label">Incorrect</div>
                </div>
              </div>
              <div className="stat-item">
                <div className="stat-icon score">⭐</div>
                <div className="stat-content">
                  <div className="stat-value">{score}</div>
                  <div className="stat-label">Score</div>
                </div>
              </div>
            </div>

            <div className="timer-section">
              <div className="timer-display">
                <div className="timer-icon">⏱️</div>
                <div className="timer-value">{formatTime(timeLeft)}</div>
              </div>
              <div className="timer-bar">
                <div 
                  className="timer-fill" 
                  style={{ width: `${(timeLeft / 120) * 100}%` }}
                ></div>
              </div>
            </div>

            <div className="hint-section">
              <button 
                className={`hint-btn ${showHint ? 'used' : ''}`}
                onClick={useHint}
                disabled={showHint}
              >
                💡 {showHint ? 'Hint Used' : 'Get Hint'}
              </button>
              {showHint && (
                <div className="hint-text">
                  <strong>Hint:</strong> {currentQuestion.hint}
                </div>
              )}
            </div>
          </div>

          <div className="quiz-content">
            <div className="question-header">
              <div className="question-meta">
                <span className="category-badge">{currentQuestion.category}</span>
                <span className="difficulty-badge">{currentQuestion.difficulty}</span>
                <span className="points-badge">🎯 {currentQuestion.points} points</span>
              </div>
              <div className="question-timer">
                <span className="time-remaining">Time remaining: {formatTime(timeLeft)}</span>
              </div>
            </div>

            <div className="question-content">
              <h2 className="question-text">{currentQuestion.question}</h2>
              
              {currentQuestion.image && (
                <div className="question-image">
                  <img src={currentQuestion.image} alt="Question visual" />
                </div>
              )}

              <div className="options-grid">
                {currentQuestion.options.map((option) => (
                  <div
                    key={option.id}
                    className={`option-card ${
                      selectedOption?.id === option.id ? 'selected' : ''
                    } ${
                      showFeedback
                        ? option.correct
                          ? 'correct'
                          : selectedOption?.id === option.id && !option.correct
                          ? 'incorrect'
                          : ''
                        : ''
                    }`}
                    onClick={() => handleOptionSelect(option)}
                  >
                    <div className="option-label">{option.id}</div>
                    <div className="option-text">{option.text}</div>
                    {showFeedback && option.correct && (
                      <div className="correct-indicator">✓</div>
                    )}
                  </div>
                ))}
              </div>
            </div>

            {showFeedback && (
              <div className={`feedback-card ${isCorrect ? 'correct' : 'incorrect'}`}>
                <div className="feedback-icon">
                  {isCorrect ? '🎉' : '💡'}
                </div>
                <div className="feedback-content">
                  <h3>{isCorrect ? 'Correct!' : 'Not quite...'}</h3>
                  <p>{feedbackMessage}</p>
                </div>
              </div>
            )}

            <div className="navigation-controls">
              <button
                className="nav-btn prev"
                onClick={prevQuestion}
                disabled={currentQuestionIndex === 0}
              >
                ← Previous
              </button>

              <div className="center-controls">
                <button
                  className="nav-btn skip"
                  onClick={skipQuestion}
                  disabled={showFeedback}
                >
                  ⏭️ Skip
                </button>
                
                {!showFeedback ? (
                  <button
                    className="nav-btn submit"
                    onClick={submitAnswer}
                    disabled={!selectedOption}
                  >
                    Submit Answer →
                  </button>
                ) : (
                  <button
                    className="nav-btn next"
                    onClick={nextQuestion}
                  >
                    {currentQuestionIndex < quizQuestions.length - 1 ? 'Next Question →' : 'Finish Quiz →'}
                  </button>
                )}
              </div>
            </div>
          </div>

          <div className="quiz-leaderboard">
            <div className="leaderboard-header">
              <h3>🏆 Live Leaderboard</h3>
              <button className="refresh-btn">🔄</button>
            </div>
            
            <div className="leaderboard-list">
              {leaderboard.map((entry, index) => (
                <div key={entry.id} className={`leaderboard-entry ${index < 3 ? 'top-three' : ''}`}>
                  <div className="entry-rank">
                    {index === 0 ? '🥇' : index === 1 ? '🥈' : index === 2 ? '🥉' : index + 1}
                  </div>
                  <div className="entry-info">
                    <div className="entry-name">{entry.name}</div>
                    <div className="entry-date">{entry.date}</div>
                  </div>
                  <div className="entry-score">{entry.score}</div>
                </div>
              ))}
            </div>

            <div className="current-player-score">
              <h4>Your Current Score</h4>
              <div className="current-score-display">
                <div className="score-value">{score}</div>
                <div className="score-label">points</div>
              </div>
              <div className="score-progress">
                <div className="progress-text">
                  Rank: <span className="rank-value">#{leaderboard.findIndex(e => e.score <= score) + 1 || leaderboard.length + 1}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      )}

      <footer className="quiz-footer">
        <div className="footer-content">
          <p>🎂 Happy Birthday Naila! • Test your knowledge and have fun!</p>
          <div className="footer-links">
            <button onClick={() => window.scrollTo({ top: 0, behavior: 'smooth' })}>
              ⬆️ Back to Top
            </button>
            <button onClick={restartQuiz}>
              🔄 Restart Quiz
            </button>
            <button onClick={() => alert('Share this quiz with friends!')}>
              📤 Share
            </button>
          </div>
        </div>
      </footer>
    </div>
  );
};

export default QuizGame;