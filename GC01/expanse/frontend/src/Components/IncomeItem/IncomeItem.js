import React from 'react'
import styled from 'styled-components'
import { dateFormat } from '../../utils/dateFormat';
import { bitcoin, book, calender, card, circle, clothing, comment, dollar, food, freelance, medical, money, piggy, stocks, takeaway, trash, tv, users, yt } from '../../utils/Icons';
import Button from '../Button/Button';

function IncomeItem({
    id,
    title,
    amount,
    date,
    category,
    description,
    deleteItem,
    indicatorColor,
    type
}) {

    const categoryIcon = () => {
        switch (category) {
            case 'salary':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'freelancing':
                return <i className="fa-solid fa-money-bill"></i>
            case 'investments':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'stocks':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'bitcoin':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'bank':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'youtube':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'other':
                return <i className="fa-solid fa-money-bill"></i>;
            default:
                return ''
        }
    }

    const expenseCatIcon = () => {
        switch (category) {
            case 'education':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'groceries':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'health':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'subscriptions':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'takeaways':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'clothing':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'travelling':
                return <i className="fa-solid fa-money-bill"></i>;
            case 'other':
                return <i className="fa-solid fa-money-bill"></i>;
            default:
                return ''
        }
    }

    console.log('type', type)

    return (
        <IncomeItemStyled indicator={indicatorColor}>
            <div className="icon">
                {type === 'expense' ? expenseCatIcon() : categoryIcon()}
            </div>
            <div className="content">
                <h5>{title}</h5>
                <div className="inner-content">
                    <div className="text">
                        <p>{<i className="fa-solid fa-money-bill"></i>} {amount}</p>
                        <p>{<i className="fa-solid fa-money-bill"></i>} {dateFormat(date)}</p>
                        <p>
                            {<i className="fa-solid fa-money-bill"></i>}
                            {description}
                        </p>
                    </div>
                    <div className="btn-con">
                        <Button
                            icon={<i className="fa-solid fa-money-bill"></i>}
                            bPad={'1rem'}
                            bRad={'50%'}
                            bg={'var(--primary-color'}
                            color={'#fff'}
                            iColor={'#fff'}
                            hColor={'var(--color-green)'}
                            onClick={() => deleteItem(id)}
                        />
                    </div>
                </div>
            </div>
        </IncomeItemStyled>
    )
}

const IncomeItemStyled = styled.div`
    background: #FCF6F9;
    border: 2px solid #FFFFFF;
    box-shadow: 0px 1px 15px rgba(0, 0, 0, 0.06);
    border-radius: 20px;
    padding: 1rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 1rem;
    width: 100%;
    color: #222260;
    .icon{
        width: 80px;
        height: 80px;
        border-radius: 20px;
        background: #F5F5F5;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #FFFFFF;
        i{
            font-size: 2.6rem;
        }
    }

    .content{
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: .2rem;
        h5{
            font-size: 1.3rem;
            padding-left: 2rem;
            position: relative;
            &::before{
                content: '';
                position: absolute;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                width: .8rem;
                height: .8rem;
                border-radius: 50%;
                background: ${props => props.indicator};
            }
        }

        .inner-content{
            display: flex;
            justify-content: space-between;
            align-items: center;
            .text{
                display: flex;
                align-items: center;
                gap: 1.5rem;
                p{
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                    color: var(--primary-color);
                    opacity: 0.8;
                }
            }
        }
    }
`;

export default IncomeItem