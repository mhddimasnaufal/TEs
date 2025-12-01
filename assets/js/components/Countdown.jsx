const Countdown = () => {
    const [timeLeft, setTimeLeft] = React.useState({
        days: 0,
        hours: 0,
        minutes: 0,
        seconds: 0
    });
    
    React.useEffect(() => {
        // Calculate next birthday (December 2, 2026)
        const calculateTimeLeft = () => {
            const now = new Date();
            const currentYear = now.getFullYear();
            let nextBirthday = new Date(currentYear, 11, 2); // December 2
            
            // If birthday has passed this year, set to next year
            if (now > nextBirthday) {
                nextBirthday.setFullYear(currentYear + 1);
            }
            
            const difference = nextBirthday.getTime() - now.getTime();
            
            if (difference > 0) {
                setTimeLeft({
                    days: Math.floor(difference / (1000 * 60 * 60 * 24)),
                    hours: Math.floor((difference / (1000 * 60 * 60)) % 24),
                    minutes: Math.floor((difference / 1000 / 60) % 60),
                    seconds: Math.floor((difference / 1000) % 60)
                });
            }
        };
        
        calculateTimeLeft();
        const timer = setInterval(calculateTimeLeft, 1000);
        
        return () => clearInterval(timer);
    }, []);
    
    return (
        <div className="countdown-container">
            <div className="countdown-item">
                <div className="countdown-number">{timeLeft.days}</div>
                <div className="countdown-label">Hari</div>
            </div>
            <div className="countdown-item">
                <div className="countdown-number">{timeLeft.hours}</div>
                <div className="countdown-label">Jam</div>
            </div>
            <div className="countdown-item">
                <div className="countdown-number">{timeLeft.minutes}</div>
                <div className="countdown-label">Menit</div>
            </div>
            <div className="countdown-item">
                <div className="countdown-number">{timeLeft.seconds}</div>
                <div className="countdown-label">Detik</div>
            </div>
        </div>
    );
};

// Render the countdown
const countdownContainer = document.getElementById('countdown-react');
if (countdownContainer) {
    const root = ReactDOM.createRoot(countdownContainer);
    root.render(<Countdown />);
}