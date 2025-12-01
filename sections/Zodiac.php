<?php
/**
 * Zodiac Section - Birthday Zodiac Information
 */
?>
<section id="zodiac" class="zodiac-section">
    <div class="section-header">
        <h2 class="section-title">Your Birthday Zodiac</h2>
        <div class="section-divider">
            <div class="divider-line"></div>
            <div class="divider-star">♋</div>
            <div class="divider-line"></div>
        </div>
        <p class="section-subtitle">Discover the cosmic influences on your special day</p>
    </div>

    <?php
    // Assuming Naila's birthday is June 20 (Cancer zodiac)
    $birthday = "June 20";
    $zodiac_sign = "Cancer";
    $zodiac_symbol = "♋";
    $zodiac_dates = "June 21 - July 22";
    $zodiac_element = "Water";
    $zodiac_planet = "Moon";
    $zodiac_house = "4th";
    $zodiac_stone = "Pearl";
    $zodiac_flower = "Lily";
    $zodiac_color = "Silver, White";
    ?>

    <div class="zodiac-container">
        <div class="zodiac-main">
            <div class="zodiac-sign">
                <div class="sign-symbol">
                    <div class="symbol-circle">
                        <span class="symbol"><?php echo $zodiac_symbol; ?></span>
                    </div>
                </div>
                <div class="sign-info">
                    <h1 class="sign-name"><?php echo $zodiac_sign; ?></h1>
                    <p class="sign-dates"><?php echo $zodiac_dates; ?></p>
                    <div class="sign-traits">
                        <span class="trait"><?php echo $zodiac_element; ?></span>
                        <span class="trait"><?php echo $zodiac_planet; ?></span>
                        <span class="trait"><?php echo $zodiac_house; ?> House</span>
                    </div>
                </div>
            </div>
            
            <div class="zodiac-description">
                <div class="description-header">
                    <h3><i class="fas fa-star-and-crescent"></i> About <?php echo $zodiac_sign; ?></h3>
                    <div class="compatibility">
                        <span class="comp-label">Best Match:</span>
                        <span class="comp-sign">Pisces, Scorpio, Taurus</span>
                    </div>
                </div>
                <div class="description-content">
                    <p>As a <?php echo $zodiac_sign; ?>, you are nurturing, intuitive, and deeply emotional. Ruled by the <?php echo $zodiac_planet; ?>, you possess strong emotional intelligence and a natural ability to care for others. Your <?php echo $zodiac_element; ?> element gives you depth and sensitivity, making you incredibly empathetic.</p>
                    
                    <div class="highlight-box">
                        <i class="fas fa-gift"></i>
                        <div class="highlight-content">
                            <h4>Birthday Blessing</h4>
                            <p>This year brings emotional growth, strengthened relationships, and opportunities for nurturing your dreams into reality.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="zodiac-details">
            <div class="detail-card">
                <div class="detail-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <div class="detail-content">
                    <h4>Birthstone</h4>
                    <h3><?php echo $zodiac_stone; ?></h3>
                    <p>Symbolizes purity, wisdom, and emotional balance. Wearing <?php echo $zodiac_stone; ?> enhances intuition and brings peace.</p>
                </div>
            </div>
            
            <div class="detail-card">
                <div class="detail-icon">
                    <i class="fas fa-seedling"></i>
                </div>
                <div class="detail-content">
                    <h4>Flower</h4>
                    <h3><?php echo $zodiac_flower; ?></h3>
                    <p>Represents purity, renewal, and transition. The <?php echo $zodiac_flower; ?> reflects your nurturing and graceful nature.</p>
                </div>
            </div>
            
            <div class="detail-card">
                <div class="detail-icon">
                    <i class="fas fa-palette"></i>
                </div>
                <div class="detail-content">
                    <h4>Colors</h4>
                    <h3><?php echo $zodiac_color; ?></h3>
                    <p>These colors bring calmness, clarity, and emotional balance. They enhance your natural intuition and creativity.</p>
                </div>
            </div>
            
            <div class="detail-card">
                <div class="detail-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="detail-content">
                    <h4>Lucky Numbers</h4>
                    <h3>2, 7, 11, 16</h3>
                    <p>These numbers resonate with your emotional nature and bring harmony, intuition, and spiritual growth.</p>
                </div>
            </div>
        </div>
        
        <div class="zodiac-traits">
            <div class="traits-section">
                <h3><i class="fas fa-thumbs-up"></i> Strengths</h3>
                <div class="traits-list">
                    <div class="trait-item">
                        <div class="trait-icon positive">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="trait-text">
                            <h4>Loyal</h4>
                            <p>Deeply committed to loved ones</p>
                        </div>
                    </div>
                    <div class="trait-item">
                        <div class="trait-icon positive">
                            <i class="fas fa-hand-holding-heart"></i>
                        </div>
                        <div class="trait-text">
                            <h4>Nurturing</h4>
                            <p>Natural caregiver and supporter</p>
                        </div>
                    </div>
                    <div class="trait-item">
                        <div class="trait-icon positive">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="trait-text">
                            <h4>Intuitive</h4>
                            <p>Strong emotional intelligence</p>
                        </div>
                    </div>
                    <div class="trait-item">
                        <div class="trait-icon positive">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="trait-text">
                            <h4>Protective</h4>
                            <p>Guards loved ones fiercely</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="traits-section">
                <h3><i class="fas fa-balance-scale"></i> Challenges</h3>
                <div class="traits-list">
                    <div class="trait-item">
                        <div class="trait-icon negative">
                            <i class="fas fa-cloud-rain"></i>
                        </div>
                        <div class="trait-text">
                            <h4>Moody</h4>
                            <p>Emotions can change quickly</p>
                        </div>
                    </div>
                    <div class="trait-item">
                        <div class="trait-icon negative">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="trait-text">
                            <h4>Overly Attached</h4>
                            <p>Can struggle with letting go</p>
                        </div>
                    </div>
                    <div class="trait-item">
                        <div class="trait-icon negative">
                            <i class="fas fa-mask"></i>
                        </div>
                        <div class="trait-text">
                            <h4>Reserved</h4>
                            <p>Takes time to open up</p>
                        </div>
                    </div>
                    <div class="trait-item">
                        <div class="trait-icon negative">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="trait-text">
                            <h4>Holds Grudges</h4>
                            <p>Has difficulty forgiving</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="zodiac-compatibility">
            <h3><i class="fas fa-heart"></i> Compatibility</h3>
            <div class="compatibility-chart">
                <div class="comp-item excellent">
                    <div class="comp-sign">Pisces</div>
                    <div class="comp-bar">
                        <div class="comp-fill" style="width: 95%"></div>
                    </div>
                    <div class="comp-percent">95%</div>
                </div>
                
                <div class="comp-item excellent">
                    <div class="comp-sign">Scorpio</div>
                    <div class="comp-bar">
                        <div class="comp-fill" style="width: 90%"></div>
                    </div>
                    <div class="comp-percent">90%</div>
                </div>
                
                <div class="comp-item good">
                    <div class="comp-sign">Taurus</div>
                    <div class="comp-bar">
                        <div class="comp-fill" style="width: 85%"></div>
                    </div>
                    <div class="comp-percent">85%</div>
                </div>
                
                <div class="comp-item good">
                    <div class="comp-sign">Virgo</div>
                    <div class="comp-bar">
                        <div class="comp-fill" style="width: 80%"></div>
                    </div>
                    <div class="comp-percent">80%</div>
                </div>
                
                <div class="comp-item average">
                    <div class="comp-sign">Capricorn</div>
                    <div class="comp-bar">
                        <div class="comp-fill" style="width: 70%"></div>
                    </div>
                    <div class="comp-percent">70%</div>
                </div>
            </div>
        </div>
        
        <div class="zodiac-year-prediction">
            <div class="prediction-header">
                <h3><i class="fas fa-crystal-ball"></i> Year Ahead Forecast</h3>
                <div class="prediction-period">
                    <span class="period-label">For:</span>
                    <span class="period-date">Birthday 2024 - 2025</span>
                </div>
            </div>
            
            <div class="prediction-cards">
                <div class="prediction-card">
                    <div class="prediction-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="prediction-content">
                        <h4>Love & Relationships</h4>
                        <p>Deep emotional connections will flourish. Existing relationships strengthen, and new meaningful connections may form.</p>
                    </div>
                </div>
                
                <div class="prediction-card">
                    <div class="prediction-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="prediction-content">
                        <h4>Career & Finance</h4>
                        <p>Professional growth through emotional intelligence. Financial stability improves with careful planning.</p>
                    </div>
                </div>
                
                <div class="prediction-card">
                    <div class="prediction-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <div class="prediction-content">
                        <h4>Personal Growth</h4>
                        <p>Significant emotional maturity and self-discovery. Intuitive abilities become stronger and more reliable.</p>
                    </div>
                </div>
                
                <div class="prediction-card">
                    <div class="prediction-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <div class="prediction-content">
                        <h4>Health & Wellness</h4>
                        <p>Focus on emotional health brings physical benefits. Water-based activities are particularly beneficial.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="zodiac-fun-facts">
            <h3><i class="fas fa-lightbulb"></i> Fun Facts About <?php echo $zodiac_sign; ?></h3>
            <div class="fun-facts-grid">
                <div class="fun-fact">
                    <div class="fact-number">01</div>
                    <div class="fact-content">
                        <h4>Home Lovers</h4>
                        <p><?php echo $zodiac_sign; ?>s are known for creating cozy, welcoming homes that serve as personal sanctuaries.</p>
                    </div>
                </div>
                
                <div class="fun-fact">
                    <div class="fact-number">02</div>
                    <div class="fact-content">
                        <h4>Great Memory</h4>
                        <p>They have excellent memories, especially for emotional experiences and personal connections.</p>
                    </div>
                </div>
                
                <div class="fun-fact">
                    <div class="fact-number">03</div>
                    <div class="fact-content">
                        <h4>Creative Cooks</h4>
                        <p>Many <?php echo $zodiac_sign; ?>s excel in the kitchen, using cooking as a way to nurture loved ones.</p>
                    </div>
                </div>
                
                <div class="fun-fact">
                    <div class="fact-number">04</div>
                    <div class="fact-content">
                        <h4>Moon Influence</h4>
                        <p>Their moods can actually follow lunar cycles, becoming more introspective during full moons.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="zodiac-cta">
        <div class="cta-content">
            <h3><i class="fas fa-star"></i> Your Cosmic Connection</h3>
            <p>The stars have aligned to make this birthday truly special. Embrace your <?php echo $zodiac_sign; ?> qualities and let them guide you through an amazing year ahead.</p>
            <button class="cta-button" id="shareZodiac">
                <i class="fas fa-share-alt"></i> Share Your Zodiac
            </button>
        </div>
        <div class="cta-image">
            <div class="cosmic-animation">
                <div class="star"></div>
                <div class="star delay-1"></div>
                <div class="star delay-2"></div>
                <div class="planet"></div>
            </div>
        </div>
    </div>
</section>

<style>
.zodiac-section {
    background: linear-gradient(135deg, #0c2461 0%, #1e3799 100%);
    color: white;
    padding: 80px 20px;
    position: relative;
    overflow: hidden;
}

.zodiac-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 30%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="10" cy="10" r="0.5" fill="white" opacity="0.3"/><circle cx="30" cy="20" r="0.8" fill="white" opacity="0.3"/><circle cx="50" cy="15" r="0.6" fill="white" opacity="0.3"/><circle cx="70" cy="25" r="0.7" fill="white" opacity="0.3"/><circle cx="90" cy="10" r="0.5" fill="white" opacity="0.3"/></svg>');
    background-size: 200px 200px;
    z-index: 0;
}

.zodiac-section > * {
    position: relative;
    z-index: 1;
}

.zodiac-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
}

.zodiac-main {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 25px;
    padding: 40px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 40px;
    align-items: center;
}

.zodiac-sign {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.sign-symbol {
    margin-bottom: 25px;
}

.symbol-circle {
    width: 180px;
    height: 180px;
    background: linear-gradient(135deg, #4a69bd 0%, #6a89cc 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 5px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 0 30px rgba(74, 105, 189, 0.5);
    animation: pulseGlow 4s ease-in-out infinite;
}

@keyframes pulseGlow {
    0%, 100% { box-shadow: 0 0 30px rgba(74, 105, 189, 0.5); }
    50% { box-shadow: 0 0 50px rgba(74, 105, 189, 0.8); }
}

.symbol {
    font-size: 80px;
    display: block;
    animation: floatSymbol 6s ease-in-out infinite;
}

@keyframes floatSymbol {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(5deg); }
}

.sign-info {
    text-align: center;
}

.sign-name {
    font-size: 42px;
    margin: 0 0 10px 0;
    color: white;
    font-weight: bold;
    background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.sign-dates {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.8);
    margin: 0 0 20px 0;
}

.sign-traits {
    display: flex;
    gap: 10px;
    justify-content: center;
    flex-wrap: wrap;
}

.sign-traits .trait {
    padding: 8px 16px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.9);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.zodiac-description {
    flex: 1;
}

.description-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 15px;
}

.description-header h3 {
    margin: 0;
    font-size: 24px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.compatibility {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.1);
    padding: 10px 20px;
    border-radius: 25px;
}

.comp-label {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.comp-sign {
    font-weight: 500;
    color: white;
}

.description-content p {
    margin: 0 0 25px 0;
    font-size: 16px;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.9);
}

.highlight-box {
    background: linear-gradient(135deg, rgba(74, 105, 189, 0.2) 0%, rgba(106, 137, 204, 0.2) 100%);
    border-radius: 15px;
    padding: 25px;
    border-left: 4px solid #4a69bd;
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.highlight-box i {
    font-size: 32px;
    color: #4a69bd;
    margin-top: 5px;
}

.highlight-content h4 {
    margin: 0 0 10px 0;
    font-size: 20px;
    color: white;
}

.highlight-content p {
    margin: 0;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
}

.zodiac-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.detail-card {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease;
    text-align: center;
}

.detail-card:hover {
    transform: translateY(-10px);
    background: rgba(255, 255, 255, 0.08);
}

.detail-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #4a69bd 0%, #6a89cc 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 30px;
}

.detail-content h4 {
    margin: 0 0 10px 0;
    font-size: 16px;
    color: rgba(255, 255, 255, 0.7);
    text-transform: uppercase;
    letter-spacing: 1px;
}

.detail-content h3 {
    margin: 0 0 15px 0;
    font-size: 28px;
    color: white;
}

.detail-content p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.6;
}

.zodiac-traits {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
}

.traits-section {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.traits-section h3 {
    margin: 0 0 25px 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.traits-list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.trait-item {
    display: flex;
    gap: 15px;
    align-items: flex-start;
}

.trait-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}

.trait-icon.positive {
    background: rgba(56, 239, 125, 0.2);
    color: #38ef7d;
}

.trait-icon.negative {
    background: rgba(255, 65, 108, 0.2);
    color: #ff416c;
}

.trait-text h4 {
    margin: 0 0 5px 0;
    font-size: 18px;
    color: white;
}

.trait-text p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.5;
}

.zodiac-compatibility {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.zodiac-compatibility h3 {
    margin: 0 0 25px 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.compatibility-chart {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.comp-item {
    display: grid;
    grid-template-columns: 100px 1fr 60px;
    gap: 20px;
    align-items: center;
}

.comp-sign {
    font-size: 18px;
    font-weight: 500;
    color: white;
    text-align: right;
}

.comp-bar {
    height: 12px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 6px;
    overflow: hidden;
}

.comp-fill {
    height: 100%;
    border-radius: 6px;
    transition: width 1s ease;
}

.comp-item.excellent .comp-fill {
    background: linear-gradient(90deg, #38ef7d 0%, #11998e 100%);
}

.comp-item.good .comp-fill {
    background: linear-gradient(90deg, #4a69bd 0%, #6a89cc 100%);
}

.comp-item.average .comp-fill {
    background: linear-gradient(90deg, #fbbd08 0%, #f27121 100%);
}

.comp-percent {
    font-size: 18px;
    font-weight: bold;
    color: white;
}

.zodiac-year-prediction {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.prediction-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;
}

.prediction-header h3 {
    margin: 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.prediction-period {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.1);
    padding: 10px 20px;
    border-radius: 20px;
}

.period-label {
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
}

.period-date {
    font-weight: 500;
    color: white;
}

.prediction-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.prediction-card {
    background: rgba(255, 255, 255, 0.03);
    border-radius: 15px;
    padding: 25px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    transition: transform 0.3s ease;
}

.prediction-card:hover {
    transform: translateY(-5px);
    background: rgba(255, 255, 255, 0.05);
}

.prediction-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #4a69bd 0%, #6a89cc 100%);
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    font-size: 24px;
}

.prediction-content h4 {
    margin: 0 0 15px 0;
    font-size: 20px;
    color: white;
}

.prediction-content p {
    margin: 0;
    font-size: 15px;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.6;
}

.zodiac-fun-facts {
    background: rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 30px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.zodiac-fun-facts h3 {
    margin: 0 0 30px 0;
    font-size: 22px;
    display: flex;
    align-items: center;
    gap: 10px;
}

.fun-facts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.fun-fact {
    display: flex;
    gap: 20px;
    align-items: flex-start;
}

.fact-number {
    font-size: 32px;
    font-weight: bold;
    color: rgba(255, 255, 255, 0.3);
    min-width: 60px;
    font-family: monospace;
}

.fact-content h4 {
    margin: 0 0 10px 0;
    font-size: 18px;
    color: white;
}

.fact-content p {
    margin: 0;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.6;
}

.zodiac-cta {
    background: linear-gradient(135deg, #4a69bd 0%, #6a89cc 100%);
    border-radius: 25px;
    padding: 50px;
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 40px;
    align-items: center;
    margin-top: 40px;
}

.cta-content h3 {
    margin: 0 0 20px 0;
    font-size: 32px;
    display: flex;
    align-items: center;
    gap: 15px;
}

.cta-content p {
    margin: 0 0 30px 0;
    font-size: 18px;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.9);
}

.cta-button {
    padding: 18px 40px;
    background: white;
    border: none;
    border-radius: 50px;
    color: #4a69bd;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 12px;
    transition: all 0.3s ease;
}

.cta-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.cta-image {
    position: relative;
    height: 200px;
}

.cosmic-animation {
    position: relative;
    width: 100%;
    height: 100%;
}

.star {
    position: absolute;
    width: 4px;
    height: 4px;
    background: white;
    border-radius: 50%;
    animation: twinkleStar 3s ease-in-out infinite;
}

.star:nth-child(1) {
    top: 20%;
    left: 30%;
}

.star:nth-child(2) {
    top: 60%;
    left: 50%;
    animation-delay: 1s;
}

.star:nth-child(3) {
    top: 40%;
    left: 70%;
    animation-delay: 2s;
}

@keyframes twinkleStar {
    0%, 100% { opacity: 0.3; }
    50% { opacity: 1; }
}

.planet {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    animation: rotatePlanet 20s linear infinite;
}

.planet::before {
    content: '';
    position: absolute;
    top: 10px;
    left: 10px;
    right: 10px;
    bottom: 10px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}

@keyframes rotatePlanet {
    from { transform: translate(-50%, -50%) rotate(0deg); }
    to { transform: translate(-50%, -50%) rotate(360deg); }
}

@media (max-width: 1024px) {
    .zodiac-main {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .zodiac-traits {
        grid-template-columns: 1fr;
    }
    
    .zodiac-cta {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .cta-image {
        height: 150px;
    }
}

@media (max-width: 768px) {
    .zodiac-section {
        padding: 60px 15px;
    }
    
    .traits-list {
        grid-template-columns: 1fr;
    }
    
    .comp-item {
        grid-template-columns: 80px 1fr 50px;
        gap: 15px;
    }
    
    .zodiac-cta {
        padding: 30px;
    }
}

@media (max-width: 480px) {
    .symbol-circle {
        width: 150px;
        height: 150px;
    }
    
    .symbol {
        font-size: 60px;
    }
    
    .sign-name {
        font-size: 32px;
    }
    
    .description-header {
        flex-direction: column;
        align-items: flex-start;
    }
    
    .comp-item {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 10px;
    }
    
    .comp-sign {
        text-align: center;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Share zodiac functionality
    const shareZodiacBtn = document.getElementById('shareZodiac');
    
    if (shareZodiacBtn) {
        shareZodiacBtn.addEventListener('click', function() {
            const zodiacSign = document.querySelector('.sign-name').textContent;
            const zodiacSymbol = document.querySelector('.symbol').textContent;
            
            const shareText = `Discover my birthday zodiac: ${zodiacSign} ${zodiacSymbol}\n\nVisit the birthday website to learn more about cosmic influences!`;
            
            if (navigator.share) {
                navigator.share({
                    title: 'My Birthday Zodiac',
                    text: shareText,
                    url: window.location.href
                }).catch(console.error);
            } else {
                // Fallback: Copy to clipboard
                navigator.clipboard.writeText(shareText + '\n' + window.location.href)
                    .then(() => {
                        const originalText = shareZodiacBtn.innerHTML;
                        shareZodiacBtn.innerHTML = '<i class="fas fa-check"></i> Copied!';
                        setTimeout(() => {
                            shareZodiacBtn.innerHTML = originalText;
                        }, 2000);
                    })
                    .catch(err => {
                        console.error('Failed to copy: ', err);
                        alert('Share this page: ' + window.location.href);
                    });
            }
        });
    }
    
    // Animate compatibility bars on scroll
    const compatibilityBars = document.querySelectorAll('.comp-fill');
    
    function animateBarsOnScroll() {
        compatibilityBars.forEach(bar => {
            const rect = bar.getBoundingClientRect();
            if (rect.top < window.innerHeight * 0.8) {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            }
        });
    }
    
    // Trigger animation when section comes into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateBarsOnScroll();
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    const zodiacSection = document.querySelector('.zodiac-compatibility');
    if (zodiacSection) {
        observer.observe(zodiacSection);
    }
    
    // Add hover effects to prediction cards
    const predictionCards = document.querySelectorAll('.prediction-card');
    predictionCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.prediction-icon i');
            if (icon) {
                icon.style.transform = 'scale(1.2)';
                icon.style.transition = 'transform 0.3s ease';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.prediction-icon i');
            if (icon) {
                icon.style.transform = 'scale(1)';
            }
        });
    });
    
    // Initialize tooltips for zodiac traits
    const traitItems = document.querySelectorAll('.trait-item');
    traitItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            const traitIcon = this.querySelector('.trait-icon');
            if (traitIcon) {
                traitIcon.style.transform = 'rotate(15deg) scale(1.1)';
                traitIcon.style.transition = 'transform 0.3s ease';
            }
        });
        
        item.addEventListener('mouseleave', function() {
            const traitIcon = this.querySelector('.trait-icon');
            if (traitIcon) {
                traitIcon.style.transform = 'rotate(0deg) scale(1)';
            }
        });
    });
});
</script>